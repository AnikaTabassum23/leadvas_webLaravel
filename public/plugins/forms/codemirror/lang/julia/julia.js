(function(mod){if(typeof exports=="object"&&typeof module=="object")
mod(require("../../lib/codemirror"));else if(typeof define=="function"&&define.amd)
define(["../../lib/codemirror"],mod);else mod(CodeMirror)})(function(CodeMirror){"use strict";CodeMirror.defineMode("julia",function(_conf,parserConf){var ERRORCLASS='error';function wordRegexp(words){return new RegExp("^(("+words.join(")|(")+"))\\b")}
var operators=parserConf.operators||/^\.?[|&^\\%*+\-<>!=\/]=?|\?|~|:|\$|\.[<>]|<<=?|>>>?=?|\.[<>=]=|->?|\/\/|\bin\b/;var delimiters=parserConf.delimiters||/^[;,()[\]{}]/;var identifiers=parserConf.identifiers||/^[_A-Za-z\u00A1-\uFFFF][_A-Za-z0-9\u00A1-\uFFFF]*!*/;var blockOpeners=["begin","function","type","immutable","let","macro","for","while","quote","if","else","elseif","try","finally","catch","do"];var blockClosers=["end","else","elseif","catch","finally"];var keywordList=['if','else','elseif','while','for','begin','let','end','do','try','catch','finally','return','break','continue','global','local','const','export','import','importall','using','function','macro','module','baremodule','type','immutable','quote','typealias','abstract','bitstype','ccall'];var builtinList=['true','false','enumerate','open','close','nothing','NaN','Inf','print','println','Int','Int8','Uint8','Int16','Uint16','Int32','Uint32','Int64','Uint64','Int128','Uint128','Bool','Char','Float16','Float32','Float64','Array','Vector','Matrix','String','UTF8String','ASCIIString','error','warn','info','@printf'];var stringPrefixes=/^(`|'|"{3}|([br]?"))/;var keywords=wordRegexp(keywordList);var builtins=wordRegexp(builtinList);var openers=wordRegexp(blockOpeners);var closers=wordRegexp(blockClosers);var macro=/^@[_A-Za-z][_A-Za-z0-9]*/;var symbol=/^:[_A-Za-z][_A-Za-z0-9]*/;var indentInfo=null;function in_array(state){var ch=cur_scope(state);if(ch=="["||ch=="{"){return!0}
else{return!1}}
function cur_scope(state){if(state.scopes.length==0){return null}
return state.scopes[state.scopes.length-1]}
function tokenBase(stream,state){var leaving_expr=state.leaving_expr;if(stream.sol()){leaving_expr=!1}
state.leaving_expr=!1;if(leaving_expr){if(stream.match(/^'+/)){return 'operator'}}
if(stream.match(/^\.{2,3}/)){return 'operator'}
if(stream.eatSpace()){return null}
var ch=stream.peek();if(ch==='#'){stream.skipToEnd();return 'comment'}
if(ch==='['){state.scopes.push("[")}
if(ch==='{'){state.scopes.push("{")}
var scope=cur_scope(state);if(scope==='['&&ch===']'){state.scopes.pop();state.leaving_expr=!0}
if(scope==='{'&&ch==='}'){state.scopes.pop();state.leaving_expr=!0}
if(ch===')'){state.leaving_expr=!0}
var match;if(!in_array(state)&&(match=stream.match(openers,!1))){state.scopes.push(match)}
if(!in_array(state)&&stream.match(closers,!1)){state.scopes.pop()}
if(in_array(state)){if(stream.match(/^end/)){return 'number'}}
if(stream.match(/^=>/)){return 'operator'}
if(stream.match(/^[0-9\.]/,!1)){var imMatcher=RegExp(/^im\b/);var floatLiteral=!1;if(stream.match(/^\d*\.(?!\.)\d+([ef][\+\-]?\d+)?/i)){floatLiteral=!0}
if(stream.match(/^\d+\.(?!\.)\d*/)){floatLiteral=!0}
if(stream.match(/^\.\d+/)){floatLiteral=!0}
if(floatLiteral){stream.match(imMatcher);state.leaving_expr=!0;return 'number'}
var intLiteral=!1;if(stream.match(/^0x[0-9a-f]+/i)){intLiteral=!0}
if(stream.match(/^0b[01]+/i)){intLiteral=!0}
if(stream.match(/^0o[0-7]+/i)){intLiteral=!0}
if(stream.match(/^[1-9]\d*(e[\+\-]?\d+)?/)){intLiteral=!0}
if(stream.match(/^0(?![\dx])/i)){intLiteral=!0}
if(intLiteral){stream.match(imMatcher);state.leaving_expr=!0;return 'number'}}
if(stream.match(/^(::)|(<:)/)){return 'operator'}
if(!leaving_expr&&stream.match(symbol)){return 'string'}
if(stream.match(operators)){return 'operator'}
if(stream.match(stringPrefixes)){state.tokenize=tokenStringFactory(stream.current());return state.tokenize(stream,state)}
if(stream.match(macro)){return 'meta'}
if(stream.match(delimiters)){return null}
if(stream.match(keywords)){return 'keyword'}
if(stream.match(builtins)){return 'builtin'}
if(stream.match(identifiers)){state.leaving_expr=!0;return 'variable'}
stream.next();return ERRORCLASS}
function tokenStringFactory(delimiter){while('rub'.indexOf(delimiter.charAt(0).toLowerCase())>=0){delimiter=delimiter.substr(1)}
var singleline=delimiter.length==1;var OUTCLASS='string';function tokenString(stream,state){while(!stream.eol()){stream.eatWhile(/[^'"\\]/);if(stream.eat('\\')){stream.next();if(singleline&&stream.eol()){return OUTCLASS}}else if(stream.match(delimiter)){state.tokenize=tokenBase;return OUTCLASS}else{stream.eat(/['"]/)}}
if(singleline){if(parserConf.singleLineStringErrors){return ERRORCLASS}else{state.tokenize=tokenBase}}
return OUTCLASS}
tokenString.isString=!0;return tokenString}
function tokenLexer(stream,state){indentInfo=null;var style=state.tokenize(stream,state);var current=stream.current();if(current==='.'){style=stream.match(identifiers,!1)?null:ERRORCLASS;if(style===null&&state.lastStyle==='meta'){style='meta'}
return style}
return style}
var external={startState:function(){return{tokenize:tokenBase,scopes:[],leaving_expr:!1}},token:function(stream,state){var style=tokenLexer(stream,state);state.lastStyle=style;return style},indent:function(state,textAfter){var delta=0;if(textAfter=="end"||textAfter=="]"||textAfter=="}"||textAfter=="else"||textAfter=="elseif"||textAfter=="catch"||textAfter=="finally"){delta=-1}
return(state.scopes.length+delta)*4},lineComment:"#",fold:"indent",electricChars:"edlsifyh]}"};return external});CodeMirror.defineMIME("text/x-julia","julia")})