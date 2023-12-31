(function(mod){if(typeof exports=="object"&&typeof module=="object")
mod(require("../../lib/codemirror"));else if(typeof define=="function"&&define.amd)
define(["../../lib/codemirror"],mod);else mod(CodeMirror)})(function(CodeMirror){"use strict";CodeMirror.defineMode("go",function(config){var indentUnit=config.indentUnit;var keywords={"break":!0,"case":!0,"chan":!0,"const":!0,"continue":!0,"default":!0,"defer":!0,"else":!0,"fallthrough":!0,"for":!0,"func":!0,"go":!0,"goto":!0,"if":!0,"import":!0,"interface":!0,"map":!0,"package":!0,"range":!0,"return":!0,"select":!0,"struct":!0,"switch":!0,"type":!0,"var":!0,"bool":!0,"byte":!0,"complex64":!0,"complex128":!0,"float32":!0,"float64":!0,"int8":!0,"int16":!0,"int32":!0,"int64":!0,"string":!0,"uint8":!0,"uint16":!0,"uint32":!0,"uint64":!0,"int":!0,"uint":!0,"uintptr":!0};var atoms={"true":!0,"false":!0,"iota":!0,"nil":!0,"append":!0,"cap":!0,"close":!0,"complex":!0,"copy":!0,"imag":!0,"len":!0,"make":!0,"new":!0,"panic":!0,"print":!0,"println":!0,"real":!0,"recover":!0};var isOperatorChar=/[+\-*&^%:=<>!|\/]/;var curPunc;function tokenBase(stream,state){var ch=stream.next();if(ch=='"'||ch=="'"||ch=="`"){state.tokenize=tokenString(ch);return state.tokenize(stream,state)}
if(/[\d\.]/.test(ch)){if(ch=="."){stream.match(/^[0-9]+([eE][\-+]?[0-9]+)?/)}else if(ch=="0"){stream.match(/^[xX][0-9a-fA-F]+/)||stream.match(/^0[0-7]+/)}else{stream.match(/^[0-9]*\.?[0-9]*([eE][\-+]?[0-9]+)?/)}
return "number"}
if(/[\[\]{}\(\),;\:\.]/.test(ch)){curPunc=ch;return null}
if(ch=="/"){if(stream.eat("*")){state.tokenize=tokenComment;return tokenComment(stream,state)}
if(stream.eat("/")){stream.skipToEnd();return "comment"}}
if(isOperatorChar.test(ch)){stream.eatWhile(isOperatorChar);return "operator"}
stream.eatWhile(/[\w\$_\xa1-\uffff]/);var cur=stream.current();if(keywords.propertyIsEnumerable(cur)){if(cur=="case"||cur=="default")curPunc="case";return "keyword"}
if(atoms.propertyIsEnumerable(cur))return "atom";return "variable"}
function tokenString(quote){return function(stream,state){var escaped=!1,next,end=!1;while((next=stream.next())!=null){if(next==quote&&!escaped){end=!0;break}
escaped=!escaped&&next=="\\"}
if(end||!(escaped||quote=="`"))
state.tokenize=tokenBase;return "string"}}
function tokenComment(stream,state){var maybeEnd=!1,ch;while(ch=stream.next()){if(ch=="/"&&maybeEnd){state.tokenize=tokenBase;break}
maybeEnd=(ch=="*")}
return "comment"}
function Context(indented,column,type,align,prev){this.indented=indented;this.column=column;this.type=type;this.align=align;this.prev=prev}
function pushContext(state,col,type){return state.context=new Context(state.indented,col,type,null,state.context)}
function popContext(state){var t=state.context.type;if(t==")"||t=="]"||t=="}")
state.indented=state.context.indented;return state.context=state.context.prev}
return{startState:function(basecolumn){return{tokenize:null,context:new Context((basecolumn||0)-indentUnit,0,"top",!1),indented:0,startOfLine:!0}},token:function(stream,state){var ctx=state.context;if(stream.sol()){if(ctx.align==null)ctx.align=!1;state.indented=stream.indentation();state.startOfLine=!0;if(ctx.type=="case")ctx.type="}"}
if(stream.eatSpace())return null;curPunc=null;var style=(state.tokenize||tokenBase)(stream,state);if(style=="comment")return style;if(ctx.align==null)ctx.align=!0;if(curPunc=="{")pushContext(state,stream.column(),"}");else if(curPunc=="[")pushContext(state,stream.column(),"]");else if(curPunc=="(")pushContext(state,stream.column(),")");else if(curPunc=="case")ctx.type="case";else if(curPunc=="}"&&ctx.type=="}")ctx=popContext(state);else if(curPunc==ctx.type)popContext(state);state.startOfLine=!1;return style},indent:function(state,textAfter){if(state.tokenize!=tokenBase&&state.tokenize!=null)return 0;var ctx=state.context,firstChar=textAfter&&textAfter.charAt(0);if(ctx.type=="case"&&/^(?:case|default)\b/.test(textAfter)){state.context.type="}";return ctx.indented}
var closing=firstChar==ctx.type;if(ctx.align)return ctx.column+(closing?0:1);else return ctx.indented+(closing?0:indentUnit)},electricChars:"{}):",fold:"brace",blockCommentStart:"/*",blockCommentEnd:"*/",lineComment:"//"}});CodeMirror.defineMIME("text/x-go","go")})