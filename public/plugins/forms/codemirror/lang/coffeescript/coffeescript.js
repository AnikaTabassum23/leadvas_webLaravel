(function(mod){if(typeof exports=="object"&&typeof module=="object")
mod(require("../../lib/codemirror"));else if(typeof define=="function"&&define.amd)
define(["../../lib/codemirror"],mod);else mod(CodeMirror)})(function(CodeMirror){"use strict";CodeMirror.defineMode("coffeescript",function(conf){var ERRORCLASS="error";function wordRegexp(words){return new RegExp("^(("+words.join(")|(")+"))\\b")}
var operators=/^(?:->|=>|\+[+=]?|-[\-=]?|\*[\*=]?|\/[\/=]?|[=!]=|<[><]?=?|>>?=?|%=?|&=?|\|=?|\^=?|\~|!|\?|(or|and|\|\||&&|\?)=)/;var delimiters=/^(?:[()\[\]{},:`=;]|\.\.?\.?)/;var identifiers=/^[_A-Za-z$][_A-Za-z$0-9]*/;var properties=/^(@|this\.)[_A-Za-z$][_A-Za-z$0-9]*/;var wordOperators=wordRegexp(["and","or","not","is","isnt","in","instanceof","typeof"]);var indentKeywords=["for","while","loop","if","unless","else","switch","try","catch","finally","class"];var commonKeywords=["break","by","continue","debugger","delete","do","in","of","new","return","then","this","@","throw","when","until","extends"];var keywords=wordRegexp(indentKeywords.concat(commonKeywords));indentKeywords=wordRegexp(indentKeywords);var stringPrefixes=/^('{3}|\"{3}|['\"])/;var regexPrefixes=/^(\/{3}|\/)/;var commonConstants=["Infinity","NaN","undefined","null","true","false","on","off","yes","no"];var constants=wordRegexp(commonConstants);function tokenBase(stream,state){if(stream.sol()){if(state.scope.align===null)state.scope.align=!1;var scopeOffset=state.scope.offset;if(stream.eatSpace()){var lineOffset=stream.indentation();if(lineOffset>scopeOffset&&state.scope.type=="coffee"){return "indent"}else if(lineOffset<scopeOffset){return "dedent"}
return null}else{if(scopeOffset>0){dedent(stream,state)}}}
if(stream.eatSpace()){return null}
var ch=stream.peek();if(stream.match("####")){stream.skipToEnd();return "comment"}
if(stream.match("###")){state.tokenize=longComment;return state.tokenize(stream,state)}
if(ch==="#"){stream.skipToEnd();return "comment"}
if(stream.match(/^-?[0-9\.]/,!1)){var floatLiteral=!1;if(stream.match(/^-?\d*\.\d+(e[\+\-]?\d+)?/i)){floatLiteral=!0}
if(stream.match(/^-?\d+\.\d*/)){floatLiteral=!0}
if(stream.match(/^-?\.\d+/)){floatLiteral=!0}
if(floatLiteral){if(stream.peek()=="."){stream.backUp(1)}
return "number"}
var intLiteral=!1;if(stream.match(/^-?0x[0-9a-f]+/i)){intLiteral=!0}
if(stream.match(/^-?[1-9]\d*(e[\+\-]?\d+)?/)){intLiteral=!0}
if(stream.match(/^-?0(?![\dx])/i)){intLiteral=!0}
if(intLiteral){return "number"}}
if(stream.match(stringPrefixes)){state.tokenize=tokenFactory(stream.current(),!1,"string");return state.tokenize(stream,state)}
if(stream.match(regexPrefixes)){if(stream.current()!="/"||stream.match(/^.*\//,!1)){state.tokenize=tokenFactory(stream.current(),!0,"string-2");return state.tokenize(stream,state)}else{stream.backUp(1)}}
if(stream.match(operators)||stream.match(wordOperators)){return "operator"}
if(stream.match(delimiters)){return "punctuation"}
if(stream.match(constants)){return "atom"}
if(stream.match(keywords)){return "keyword"}
if(stream.match(identifiers)){return "variable"}
if(stream.match(properties)){return "property"}
stream.next();return ERRORCLASS}
function tokenFactory(delimiter,singleline,outclass){return function(stream,state){while(!stream.eol()){stream.eatWhile(/[^'"\/\\]/);if(stream.eat("\\")){stream.next();if(singleline&&stream.eol()){return outclass}}else if(stream.match(delimiter)){state.tokenize=tokenBase;return outclass}else{stream.eat(/['"\/]/)}}
if(singleline){if(conf.mode.singleLineStringErrors){outclass=ERRORCLASS}else{state.tokenize=tokenBase}}
return outclass}}
function longComment(stream,state){while(!stream.eol()){stream.eatWhile(/[^#]/);if(stream.match("###")){state.tokenize=tokenBase;break}
stream.eatWhile("#")}
return "comment"}
function indent(stream,state,type){type=type||"coffee";var offset=0,align=!1,alignOffset=null;for(var scope=state.scope;scope;scope=scope.prev){if(scope.type==="coffee"||scope.type=="}"){offset=scope.offset+conf.indentUnit;break}}
if(type!=="coffee"){align=null;alignOffset=stream.column()+stream.current().length}else if(state.scope.align){state.scope.align=!1}
state.scope={offset:offset,type:type,prev:state.scope,align:align,alignOffset:alignOffset}}
function dedent(stream,state){if(!state.scope.prev)return;if(state.scope.type==="coffee"){var _indent=stream.indentation();var matched=!1;for(var scope=state.scope;scope;scope=scope.prev){if(_indent===scope.offset){matched=!0;break}}
if(!matched){return!0}
while(state.scope.prev&&state.scope.offset!==_indent){state.scope=state.scope.prev}
return!1}else{state.scope=state.scope.prev;return!1}}
function tokenLexer(stream,state){var style=state.tokenize(stream,state);var current=stream.current();if(current==="."){style=state.tokenize(stream,state);current=stream.current();if(/^\.[\w$]+$/.test(current)){return "variable"}else{return ERRORCLASS}}
if(current==="return"){state.dedent=!0}
if(((current==="->"||current==="=>")&&!state.lambda&&!stream.peek())||style==="indent"){indent(stream,state)}
var delimiter_index="[({".indexOf(current);if(delimiter_index!==-1){indent(stream,state,"])}".slice(delimiter_index,delimiter_index+1))}
if(indentKeywords.exec(current)){indent(stream,state)}
if(current=="then"){dedent(stream,state)}
if(style==="dedent"){if(dedent(stream,state)){return ERRORCLASS}}
delimiter_index="])}".indexOf(current);if(delimiter_index!==-1){while(state.scope.type=="coffee"&&state.scope.prev)
state.scope=state.scope.prev;if(state.scope.type==current)
state.scope=state.scope.prev}
if(state.dedent&&stream.eol()){if(state.scope.type=="coffee"&&state.scope.prev)
state.scope=state.scope.prev;state.dedent=!1}
return style}
var external={startState:function(basecolumn){return{tokenize:tokenBase,scope:{offset:basecolumn||0,type:"coffee",prev:null,align:!1},lastToken:null,lambda:!1,dedent:0}},token:function(stream,state){var fillAlign=state.scope.align===null&&state.scope;if(fillAlign&&stream.sol())fillAlign.align=!1;var style=tokenLexer(stream,state);if(fillAlign&&style&&style!="comment")fillAlign.align=!0;state.lastToken={style:style,content:stream.current()};if(stream.eol()&&stream.lambda){state.lambda=!1}
return style},indent:function(state,text){if(state.tokenize!=tokenBase)return 0;var scope=state.scope;var closer=text&&"])}".indexOf(text.charAt(0))>-1;if(closer)while(scope.type=="coffee"&&scope.prev)scope=scope.prev;var closes=closer&&scope.type===text.charAt(0);if(scope.align)
return scope.alignOffset-(closes?1:0);else return(closes?scope.prev:scope).offset},lineComment:"#",fold:"indent"};return external});CodeMirror.defineMIME("text/x-coffeescript","coffeescript")})