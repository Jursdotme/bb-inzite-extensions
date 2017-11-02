.inz-description-list {
  margin: 0;
}

.stacked dt {
  font-weight: bold;
  text-decoration: underline;
}

.stacked dd {
  margin: 0;
  padding: 0 0 0.5em 0;
}

.inline dt {
  float: left;
  clear: left;
  width: <?php echo $settings->term_width; ?>px;
  text-align: <?php echo $settings->term_float; ?>;
  font-weight: bold;
}

.inline dt::after {
  content: ":";
}

.inline dd {
  margin: 0 0 0 calc(<?php echo $settings->term_width; ?>px + 1rem);
  padding: 0 0 <?php echo $settings->item_spacing; ?> 0;
}
