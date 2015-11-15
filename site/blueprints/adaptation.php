<?php if(!defined('KIRBY')) exit ?>

title: Adaptation
pages: false
files:
  sortable: true
  fields:
    type:
      label: Image Type
      type: radio
      columns: 3
      default: studio
      options:
        studio: "Studio"
        inuse: "In-Use"
        diagram: "Diagram"
    caption:
      label: Caption
      type: textarea
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea
  verbs:
    label: Verbs
    type:  tags