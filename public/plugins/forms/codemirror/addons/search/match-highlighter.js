(function(mod){if(typeof exports=="object"&&typeof module=="object")
mod(require("../../lib/codemirror"));else if(typeof define=="function"&&define.amd)
define(["../../lib/codemirror"],mod);else mod(CodeMirror)})(function(CodeMirror){"use strict";var DEFAULT_MIN_CHARS=2;var DEFAULT_TOKEN_STYLE="matchhighlight";var DEFAULT_DELAY=100;var DEFAULT_WORDS_ONLY=!1;function State(options){if(typeof options=="object"){this.minChars=options.minChars;this.style=options.style;this.showToken=options.showToken;this.delay=options.delay;this.wordsOnly=options.wordsOnly}
if(this.style==null)this.style=DEFAULT_TOKEN_STYLE;if(this.minChars==null)this.minChars=DEFAULT_MIN_CHARS;if(this.delay==null)this.delay=DEFAULT_DELAY;if(this.wordsOnly==null)this.wordsOnly=DEFAULT_WORDS_ONLY;this.overlay=this.timeout=null}
CodeMirror.defineOption("highlightSelectionMatches",!1,function(cm,val,old){if(old&&old!=CodeMirror.Init){var over=cm.state.matchHighlighter.overlay;if(over)cm.removeOverlay(over);clearTimeout(cm.state.matchHighlighter.timeout);cm.state.matchHighlighter=null;cm.off("cursorActivity",cursorActivity)}
if(val){cm.state.matchHighlighter=new State(val);highlightMatches(cm);cm.on("cursorActivity",cursorActivity)}});function cursorActivity(cm){var state=cm.state.matchHighlighter;clearTimeout(state.timeout);state.timeout=setTimeout(function(){highlightMatches(cm)},state.delay)}
function highlightMatches(cm){cm.operation(function(){var state=cm.state.matchHighlighter;if(state.overlay){cm.removeOverlay(state.overlay);state.overlay=null}
if(!cm.somethingSelected()&&state.showToken){var re=state.showToken===!0?/[\w$]/:state.showToken;var cur=cm.getCursor(),line=cm.getLine(cur.line),start=cur.ch,end=start;while(start&&re.test(line.charAt(start-1)))--start;while(end<line.length&&re.test(line.charAt(end)))++end;if(start<end)
cm.addOverlay(state.overlay=makeOverlay(line.slice(start,end),re,state.style));return}
var from=cm.getCursor("from"),to=cm.getCursor("to");if(from.line!=to.line)return;if(state.wordsOnly&&!isWord(cm,from,to))return;var selection=cm.getRange(from,to).replace(/^\s+|\s+$/g,"");if(selection.length>=state.minChars)
cm.addOverlay(state.overlay=makeOverlay(selection,!1,state.style))})}
function isWord(cm,from,to){var str=cm.getRange(from,to);if(str.match(/^\w+$/)!==null){if(from.ch>0){var pos={line:from.line,ch:from.ch-1};var chr=cm.getRange(pos,from);if(chr.match(/\W/)===null)return!1}
if(to.ch<cm.getLine(from.line).length){var pos={line:to.line,ch:to.ch+1};var chr=cm.getRange(to,pos);if(chr.match(/\W/)===null)return!1}
return!0}else return!1}
function boundariesAround(stream,re){return(!stream.start||!re.test(stream.string.charAt(stream.start-1)))&&(stream.pos==stream.string.length||!re.test(stream.string.charAt(stream.pos)))}
function makeOverlay(query,hasBoundary,style){return{token:function(stream){if(stream.match(query)&&(!hasBoundary||boundariesAround(stream,hasBoundary)))
return style;stream.next();stream.skipTo(query.charAt(0))||stream.skipToEnd()}}}})