<?php

return function($site, $pages, $page) {

  // get all articles and add pagination
  $studio = $page->images()->filterBy('kind', 'studio')->sortBy('sort', 'asc');
  $inuse = $page->images()->filterBy('kind', 'inuse')->sortBy('sort', 'asc');
  $diagram = $page->images()->filterBy('kind', 'diagram')->sortBy('sort', 'asc');

  return compact('studio', 'inuse', 'diagram');

};