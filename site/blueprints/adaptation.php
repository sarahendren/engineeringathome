<?php if(!defined('KIRBY')) exit ?>

title: Adaptation
pages: false
files:
  sortable: true
  fields:
    caption:
      label: Caption
      type: textarea
    kind:
      label: Image Kind
      type: radio
      default: studio
      options:
        studio: "Studio"
        inuse: "In Use"
        diagram: "Diagram"
fields:
  title:
    label: Title
    type:  text
  intro:
    label: Intro
    type:  markdown
  text:
    label: Text
    type:  markdown
  verbs:
    label: Actions
    type:  tags