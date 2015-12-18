<?php

// Footnotes field method: $page->text()->footnotes()->kt()
field::$methods['footnotes'] = function($field, $convert = true) {
  $footnotes    = new Footnotes($field->value, $field->page);
  $field->value = $convert ? $footnotes->process() : $footnotes->remove();
  return $field;
};

// Kirbytext pre-filter (if option 'footnotes.global' is true)
if(c::get('footnotes.global', false)) {
  kirbytext::$post[] = function($kirbytext, $value) {
    global $page;
    $footnotes = new Footnotes($value, kirby()->site()->activePage());
    return $footnotes->process($page);
  };
}


/**
 *  Footnotes class
 */

class Footnotes {

  public $text = '';
  public $page = null;

  private $matches       = null;
  private $entries       = '';
  private $templates     = null;
  private $regexFootnote = '/\[(\d+\..*?)\]/s';
  private $regexContent  = '/\[\d+\.(.*?)\]/s';


  public function __construct($text, $page) {
    $this->text      = $text;
    $this->page      = $page;
    $this->templates = array(
      'allowed' => c::get('footnotes.templates.allow', true),
      'ignore'  => c::get('footnotes.templates.ignore', array())
    );
  }


  public function process() {
    $check = ($this->templates['allowed'] === true or
              in_array($this->page->template(), $this->templates['allowed'])) and
             !in_array($this->page->template(), $this->templates['ignore']);

    return $check ? $this->convert() : $this->remove();
  }


  public function convert() {
    if(preg_match_all($this->regexFootnote, $this->text, $this->matches)) {

      $fns = array_map(array($this, 'clean'), $this->matches[0]);

      // merge duplicates
      if(c::get('footnotes.merge', false)) $fns = array_unique($fns);

      $count = 1;
      $order = 1;

      foreach($fns as $key => $fn) {
        $args = array(
          'fn'     => $fn,
          '#'      => $count,
          'no.'    => $order,
          'hide'   => substr($fn, 0, 4) === '<no>'
        );

        $replace = $this->reference($args);
        $this->replace($key, $replace);

        $entry = $this->entry($args);
        $this->bibentry($entry);

        $count++;
        if(!$args['hide']) $order++;
      }

      $this->text .= $this->bibliography();

      // append js to script of smooth scroll active
      if(c::get('footnotes.smoothscroll', true)) $this->text .= $this->script();
    }

    return $this->text;
  }


  public function remove() {
    if (preg_match_all($this->regexFootnote, $this->text, $this->matches)) {
      foreach($this->matches[0] as $fn) {
          $this->text = str_replace($fn, '', $this->text);
      }
    }
    return $this->text;
  }


  private function replace($key, $replace) {
    if(c::get('footnotes.merge', false)) {
      $regex      =     preg_quote($this->matches[0][$key]);
      $regex      = '#'.preg_replace('/(\\\[[0-9]*\\\. )/', '\[[0-9]*\. ', $regex).'#';
      $this->text =     preg_replace($regex, $replace, $this->text);
    } else {
      $this->text = str_replace($this->matches[0][$key], $replace, $this->text);
    }
  }


  private function clean($fn) {
    $fn  = preg_replace($this->regexContent, '\1', $fn);
    return str_replace(array('<p>','</p>'), '', kirbytext($fn));
  }


  private function bibentry($entry) {
    $this->entries .= $entry;
  }


  private function bibliography() {
    $list  = '<div class="footnotes" id="footnotes">';
    $list .= '<div class="footnotedivider"></div>';
    $list .= '<ol>';
    $list .= $this->entries;
    $list .= '</ol>';
    $list .= '</div>';
    return $list;
  }


  private function reference($p) {
    return $p['hide'] ? '' : '<sup class="footnote"><a href="#fn-'.$p['#'].'" id="fnref-'.$p['#'].'">'.$p['no.'].'</a></sup>';
  }


  private function entry($p) {
    return $p['hide'] ? '<li id="fn-'.$p['#'].'" style="list-style-type:none">'.$p['fn'].'</li>' : '<li id="fn-'.$p['#'].'" value="'.$p['no.'].'">'.$p['fn'].' <span class="footnotereverse"><a href="#fnref-'.$p['#'].'">&#8617;</a></span></li>';
  }


  private function script() {
    $script = '
      <script>
      document.addEventListener("DOMContentLoaded",function(){"use strict";for(var e=document.querySelectorAll(\'.footnote > a[href*="#"]:not([href="#"]), .footnotereverse > a[href*="#"]:not([href="#"])\'),t=e.length,n=/firefox|trident/i.test(navigator.userAgent)?document.documentElement:document.body,o=function(e,t,n,o){return(e/=o/2)<1?n/2*e*e*e+t:n/2*((e-=2)*e*e+2)+t};t--;)e.item(t).addEventListener("click",function(e){var t,r=n.scrollTop,i=document.getElementById(/[^#]+$/.exec(this.href)[0]).getBoundingClientRect().top+'.c::get('footnotes.offset', 0).',c=n.scrollHeight-window.innerHeight,u=c>r+i?i:c-r,d='.c::get('footnotes.smoothscroll.speed', 500).',a=function(e){t=t||e;var i=e-t,c=o(i,r,u,d);return n.scrollTop=c,d>i&&requestAnimationFrame(a)};requestAnimationFrame(a),e.preventDefault()})});
      </script>
    ';
    return $script;
  }
}
