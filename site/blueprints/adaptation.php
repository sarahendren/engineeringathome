<?php if(!defined('KIRBY')) exit ?>

title: Adaptation
pages: false
files:
  sortable: true
  fields:
    kind:
      label: Image Kind
      type: radio
      columns: 3
      default: studio
      options:
        studio: "Studio"
        closeup: "Closeup"
        inuse: "In-Use"
        diagram: "Diagram"
    photoedits:
      label: Photo Edit Comments (Private)
      type: textarea
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