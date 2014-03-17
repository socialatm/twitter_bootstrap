<?php
/**
 * CSS buttons
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>
/* **************************
	BUTTONS
************************** */

/* Base */
.elgg-button {
	display: inline-block;
  *display: inline;
  padding: 4px 10px 4px;
  margin-bottom: 0;
  *margin-left: .3em;
  font-size: 13px;
  line-height: 18px;
  *line-height: 20px;
  color: #333333;
  text-align: center;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
  vertical-align: middle;
  cursor: pointer;
  background-color: #f5f5f5;
  *background-color: #e6e6e6;
  background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
  background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
  background-image: linear-gradient(top, #ffffff, #e6e6e6);
  background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
  background-repeat: repeat-x;
  border: 1px solid #cccccc;
  *border: 0;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  border-color: #e6e6e6 #e6e6e6 #bfbfbf;
  border-bottom-color: #b3b3b3;
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
  filter: progid:dximagetransform.microsoft.gradient(enabled=false);
  *zoom: 1;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
     -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
          box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
}
.elgg-button:hover,
.elgg-button:active,
.elgg-button.active,
.elgg-button.disabled,
.elgg-button[disabled] {
  background-color: #e6e6e6;
  *background-color: #d9d9d9;
}

.elgg-button:active,
.elgg-button.active {
  background-color: #cccccc \9;
}

.elgg-button:first-child {
  *margin-left: 0;
}

.elgg-button:hover {
  color: #333333;
  text-decoration: none;
  background-color: #e6e6e6;
  *background-color: #d9d9d9;
  /* Buttons in IE7 don't get borders, so darken on hover */

  background-position: 0 -15px;
  -webkit-transition: background-position 0.1s linear;
     -moz-transition: background-position 0.1s linear;
      -ms-transition: background-position 0.1s linear;
       -o-transition: background-position 0.1s linear;
          transition: background-position 0.1s linear;
}

.elgg-button:focus {
  outline: thin dotted #333;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;
}

.elgg-button.active,
.elgg-button:active {
  background-color: #e6e6e6;
  background-color: #d9d9d9 \9;
  background-image: none;
  outline: 0;
  -webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
     -moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
          box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
}

.elgg-button.disabled,
.elgg-button[disabled] {
  cursor: default;
  background-color: #e6e6e6;
  background-image: none;
  opacity: 0.65;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
     -moz-box-shadow: none;
          box-shadow: none;
}

.elgg-button-large {
  padding: 9px 14px;
  font-size: 15px;
  line-height: normal;
  -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
          border-radius: 5px;
}

.elgg-button-large [class^="glyphicon glyphicon-"] {
  margin-top: 1px;
}

.elgg-button-small {
  padding: 5px 9px;
  font-size: 11px;
  line-height: 16px;
}

.elgg-button-small [class^="glyphicon .glyphicon-"] {
  margin-top: -1px;
}

.elgg-button-mini {
  padding: 2px 6px;
  font-size: 11px;
  line-height: 14px;
}

.elgg-button-primary,
.elgg-button-primary:hover,
.elgg-button-warning,
.elgg-button-warning:hover,
.elgg-button-danger,
.elgg-button-danger:hover,
.elgg-button-success,
.elgg-button-success:hover,
.elgg-button-info,
.elgg-button-info:hover,
.elgg-button-inverse,
.elgg-button-inverse:hover {
  color: #ffffff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}

.elgg-button-primary.active,
.elgg-button-warning.active,
.elgg-button-danger.active,
.elgg-button-success.active,
.elgg-button-info.active,
.elgg-button-inverse.active {
  color: rgba(255, 255, 255, 0.75);
}

.elgg-button {
  border-color: #ccc;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}

.elgg-button-primary {
  background-color: #0074cc;
  *background-color: #0055cc;
  background-image: -ms-linear-gradient(top, #0088cc, #0055cc);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0055cc));
  background-image: -webkit-linear-gradient(top, #0088cc, #0055cc);
  background-image: -o-linear-gradient(top, #0088cc, #0055cc);
  background-image: -moz-linear-gradient(top, #0088cc, #0055cc);
  background-image: linear-gradient(top, #0088cc, #0055cc);
  background-repeat: repeat-x;
  border-color: #0055cc #0055cc #003580;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:dximagetransform.microsoft.gradient(startColorstr='#0088cc', endColorstr='#0055cc', GradientType=0);
  filter: progid:dximagetransform.microsoft.gradient(enabled=false);
}

.elgg-button-primary:hover,
.elgg-button-primary:active,
.elgg-button-primary.active,
.elgg-button-primary.disabled,
.elgg-button-primary[disabled] {
  background-color: #0055cc;
  *background-color: #004ab3;
}

.elgg-button-primary:active,
.elgg-button-primary.active {
  background-color: #004099 \9;
}

.elgg-button-warning {
  background-color: #faa732;
  *background-color: #f89406;
  background-image: -ms-linear-gradient(top, #fbb450, #f89406);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#fbb450), to(#f89406));
  background-image: -webkit-linear-gradient(top, #fbb450, #f89406);
  background-image: -o-linear-gradient(top, #fbb450, #f89406);
  background-image: -moz-linear-gradient(top, #fbb450, #f89406);
  background-image: linear-gradient(top, #fbb450, #f89406);
  background-repeat: repeat-x;
  border-color: #f89406 #f89406 #ad6704;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:dximagetransform.microsoft.gradient(startColorstr='#fbb450', endColorstr='#f89406', GradientType=0);
  filter: progid:dximagetransform.microsoft.gradient(enabled=false);
}

.elgg-button-warning:hover,
.elgg-button-warning:active,
.elgg-button-warning.active,
.elgg-button-warning.disabled,
.elgg-button-warning[disabled] {
  background-color: #f89406;
  *background-color: #df8505;
}

.elgg-button-warning:active,
.elgg-button-warning.active {
  background-color: #c67605 \9;
}

.elgg-button-danger {
  background-color: #da4f49;
  *background-color: #bd362f;
  background-image: -ms-linear-gradient(top, #ee5f5b, #bd362f);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ee5f5b), to(#bd362f));
  background-image: -webkit-linear-gradient(top, #ee5f5b, #bd362f);
  background-image: -o-linear-gradient(top, #ee5f5b, #bd362f);
  background-image: -moz-linear-gradient(top, #ee5f5b, #bd362f);
  background-image: linear-gradient(top, #ee5f5b, #bd362f);
  background-repeat: repeat-x;
  border-color: #bd362f #bd362f #802420;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ee5f5b', endColorstr='#bd362f', GradientType=0);
  filter: progid:dximagetransform.microsoft.gradient(enabled=false);
}

.elgg-button-danger:hover,
.elgg-button-danger:active,
.elgg-button-danger.active,
.elgg-button-danger.disabled,
.elgg-button-danger[disabled] {
  background-color: #bd362f;
  *background-color: #a9302a;
}

.elgg-button-danger:active,
.elgg-button-danger.active {
  background-color: #942a25 \9;
}

.elgg-button-success {
  background-color: #5bb75b;
  *background-color: #51a351;
  background-image: -ms-linear-gradient(top, #62c462, #51a351);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#62c462), to(#51a351));
  background-image: -webkit-linear-gradient(top, #62c462, #51a351);
  background-image: -o-linear-gradient(top, #62c462, #51a351);
  background-image: -moz-linear-gradient(top, #62c462, #51a351);
  background-image: linear-gradient(top, #62c462, #51a351);
  background-repeat: repeat-x;
  border-color: #51a351 #51a351 #387038;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:dximagetransform.microsoft.gradient(startColorstr='#62c462', endColorstr='#51a351', GradientType=0);
  filter: progid:dximagetransform.microsoft.gradient(enabled=false);
}

.elgg-button-success:hover,
.elgg-button-success:active,
.elgg-button-success.active,
.elgg-button-success.disabled,
.elgg-button-success[disabled] {
  background-color: #51a351;
  *background-color: #499249;
}

.elgg-button-success:active,
.elgg-button-success.active {
  background-color: #408140 \9;
}

.elgg-button-info {
  background-color: #49afcd;
  *background-color: #2f96b4;
  background-image: -ms-linear-gradient(top, #5bc0de, #2f96b4);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#5bc0de), to(#2f96b4));
  background-image: -webkit-linear-gradient(top, #5bc0de, #2f96b4);
  background-image: -o-linear-gradient(top, #5bc0de, #2f96b4);
  background-image: -moz-linear-gradient(top, #5bc0de, #2f96b4);
  background-image: linear-gradient(top, #5bc0de, #2f96b4);
  background-repeat: repeat-x;
  border-color: #2f96b4 #2f96b4 #1f6377;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:dximagetransform.microsoft.gradient(startColorstr='#5bc0de', endColorstr='#2f96b4', GradientType=0);
  filter: progid:dximagetransform.microsoft.gradient(enabled=false);
}

.elgg-button-info:hover,
.elgg-button-info:active,
.elgg-button-info.active,
.elgg-button-info.disabled,
.elgg-button-info[disabled] {
  background-color: #2f96b4;
  *background-color: #2a85a0;
}

.elgg-button-info:active,
.elgg-button-info.active {
  background-color: #24748c \9;
}

.elgg-button-inverse {
  background-color: #414141;
  *background-color: #222222;
  background-image: -ms-linear-gradient(top, #555555, #222222);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#555555), to(#222222));
  background-image: -webkit-linear-gradient(top, #555555, #222222);
  background-image: -o-linear-gradient(top, #555555, #222222);
  background-image: -moz-linear-gradient(top, #555555, #222222);
  background-image: linear-gradient(top, #555555, #222222);
  background-repeat: repeat-x;
  border-color: #222222 #222222 #000000;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:dximagetransform.microsoft.gradient(startColorstr='#555555', endColorstr='#222222', GradientType=0);
  filter: progid:dximagetransform.microsoft.gradient(enabled=false);
}

.elgg-button-inverse:hover,
.elgg-button-inverse:active,
.elgg-button-inverse.active,
.elgg-button-inverse.disabled,
.elgg-button-inverse[disabled] {
  background-color: #222222;
  *background-color: #151515;
}

.elgg-button-inverse:active,
.elgg-button-inverse.active {
  background-color: #080808 \9;
}

button.elgg-button,
input[type="submit"].elgg-button {
  *padding-top: 2px;
  *padding-bottom: 2px;
}

button.elgg-button::-moz-focus-inner,
input[type="submit"].elgg-button::-moz-focus-inner {
  padding: 0;
  border: 0;
}

button.elgg-button.elgg-button-large,
input[type="submit"].elgg-button.elgg-button-large {
  *padding-top: 7px;
  *padding-bottom: 7px;
}

button.elgg-button.elgg-button-small,
input[type="submit"].elgg-button.elgg-button-small {
  *padding-top: 3px;
  *padding-bottom: 3px;
}

button.elgg-button.elgg-button-mini,
input[type="submit"].elgg-button.elgg-button-mini {
  *padding-top: 1px;
  *padding-bottom: 1px;
}

.elgg-button-group {
  position: relative;
  *margin-left: .3em;
  *zoom: 1;
}

.elgg-button-group:before,
.elgg-button-group:after {
  display: table;
  content: "";
}

.elgg-button-group:after {
  clear: both;
}

.elgg-button-group:first-child {
  *margin-left: 0;
}

.elgg-button-group + .elgg-button-group {
  margin-left: 5px;
}

.elgg-button-toolbar {
  margin-top: 9px;
  margin-bottom: 9px;
}

.elgg-button-toolbar .elgg-button-group {
  display: inline-block;
  *display: inline;
  /* IE7 inline-block hack */

  *zoom: 1;
}

.elgg-button-group > .elgg-button {
  position: relative;
  float: left;
  margin-left: -1px;
  -webkit-border-radius: 0;
     -moz-border-radius: 0;
          border-radius: 0;
}

.elgg-button-group > .elgg-button:first-child {
  margin-left: 0;
  -webkit-border-bottom-left-radius: 4px;
          border-bottom-left-radius: 4px;
  -webkit-border-top-left-radius: 4px;
          border-top-left-radius: 4px;
  -moz-border-radius-bottomleft: 4px;
  -moz-border-radius-topleft: 4px;
}

.elgg-button-group > .elgg-button:last-child,
.elgg-button-group > .dropdown-toggle {
  -webkit-border-top-right-radius: 4px;
          border-top-right-radius: 4px;
  -webkit-border-bottom-right-radius: 4px;
          border-bottom-right-radius: 4px;
  -moz-border-radius-topright: 4px;
  -moz-border-radius-bottomright: 4px;
}

.elgg-button-group > .elgg-button.large:first-child {
  margin-left: 0;
  -webkit-border-bottom-left-radius: 6px;
          border-bottom-left-radius: 6px;
  -webkit-border-top-left-radius: 6px;
          border-top-left-radius: 6px;
  -moz-border-radius-bottomleft: 6px;
  -moz-border-radius-topleft: 6px;
}

.elgg-button-group > .elgg-button.large:last-child,
.elgg-button-group > .large.dropdown-toggle {
  -webkit-border-top-right-radius: 6px;
          border-top-right-radius: 6px;
  -webkit-border-bottom-right-radius: 6px;
          border-bottom-right-radius: 6px;
  -moz-border-radius-topright: 6px;
  -moz-border-radius-bottomright: 6px;
}

.elgg-button-group > .elgg-button:hover,
.elgg-button-group > .elgg-button:focus,
.elgg-button-group > .elgg-button:active,
.elgg-button-group > .elgg-button.active {
  z-index: 2;
}

.elgg-button-group .dropdown-toggle:active,
.elgg-button-group.open .dropdown-toggle {
  outline: 0;
}

.elgg-button-group > .dropdown-toggle {
  *padding-top: 4px;
  padding-right: 8px;
  *padding-bottom: 4px;
  padding-left: 8px;
  -webkit-box-shadow: inset 1px 0 0 rgba(255, 255, 255, 0.125), inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
     -moz-box-shadow: inset 1px 0 0 rgba(255, 255, 255, 0.125), inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
          box-shadow: inset 1px 0 0 rgba(255, 255, 255, 0.125), inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
}

.elgg-button-group > .elgg-button-mini.dropdown-toggle {
  padding-right: 5px;
  padding-left: 5px;
}

.elgg-button-group > .elgg-button-small.dropdown-toggle {
  *padding-top: 4px;
  *padding-bottom: 4px;
}

.elgg-button-group > .elgg-button-large.dropdown-toggle {
  padding-right: 12px;
  padding-left: 12px;
}

.elgg-button-group.open .dropdown-toggle {
  background-image: none;
  -webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
     -moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
          box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
}

.elgg-button-group.open .elgg-button.dropdown-toggle {
  background-color: #e6e6e6;
}

.elgg-button-group.open .elgg-button-primary.dropdown-toggle {
  background-color: #0055cc;
}

.elgg-button-group.open .elgg-button-warning.dropdown-toggle {
  background-color: #f89406;
}

.elgg-button-group.open .elgg-button-danger.dropdown-toggle {
  background-color: #bd362f;
}

.elgg-button-group.open .elgg-button-success.dropdown-toggle {
  background-color: #51a351;
}

.elgg-button-group.open .elgg-button-info.dropdown-toggle {
  background-color: #2f96b4;
}

.elgg-button-group.open .elgg-button-inverse.dropdown-toggle {
  background-color: #222222;
}

.elgg-button .caret {
  margin-top: 7px;
  margin-left: 0;
}

.elgg-button:hover .caret,
.open.elgg-button-group .caret {
  opacity: 1;
  filter: alpha(opacity=100);
}

.elgg-button-mini .caret {
  margin-top: 5px;
}

.elgg-button-small .caret {
  margin-top: 6px;
}

.elgg-button-large .caret {
  margin-top: 6px;
  border-top-width: 5px;
  border-right-width: 5px;
  border-left-width: 5px;
}

.dropup .elgg-button-large .caret {
  border-top: 0;
  border-bottom: 5px solid #000000;
}

.elgg-button-primary .caret,
.elgg-button-warning .caret,
.elgg-button-danger .caret,
.elgg-button-info .caret,
.elgg-button-success .caret,
.elgg-button-inverse .caret {
  border-top-color: #ffffff;
  border-bottom-color: #ffffff;
  opacity: 0.75;
  filter: alpha(opacity=75);
}

.input-group .elgg-button,
.input-group .elgg-button {
  margin-left: -1px;
  -webkit-border-radius: 0;
     -moz-border-radius: 0;
          border-radius: 0;
}

.input-group .elgg-button {
  margin-right: -1px;
}

.input-group .elgg-button:first-child {
  -webkit-border-radius: 3px 0 0 3px;
     -moz-border-radius: 3px 0 0 3px;
          border-radius: 3px 0 0 3px;
}

.input-group .elgg-button:last-child {
  -webkit-border-radius: 0 3px 3px 0;
     -moz-border-radius: 0 3px 3px 0;
          border-radius: 0 3px 3px 0;
}

.input-group.input-group .elgg-button:last-child {
  margin-left: -1px;
  -webkit-border-radius: 0 3px 3px 0;
     -moz-border-radius: 0 3px 3px 0;
          border-radius: 0 3px 3px 0;
}