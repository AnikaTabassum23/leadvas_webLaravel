(function(mod){if(typeof exports=="object"&&typeof module=="object")
mod(require("../../lib/codemirror"),require("../javascript/javascript"),require("../css/css"),require("../htmlmixed/htmlmixed"));else if(typeof define=="function"&&define.amd)
define(["../../lib/codemirror","../javascript/javascript","../css/css","../htmlmixed/htmlmixed"],mod);else mod(CodeMirror)})(function(CodeMirror){"use strict";CodeMirror.defineMode('jade',function(config){var KEYWORD='keyword';var DOCTYPE='meta';var ID='builtin';var CLASS='qualifier';var ATTRS_NEST={'{':'}','(':')','[':']'};var jsMode=CodeMirror.getMode(config,'javascript');function State(){this.javaScriptLine=!1;this.javaScriptLineExcludesColon=!1;this.javaScriptArguments=!1;this.javaScriptArgumentsDepth=0;this.isInterpolating=!1;this.interpolationNesting=0;this.jsState=jsMode.startState();this.restOfLine='';this.isIncludeFiltered=!1;this.isEach=!1;this.lastTag='';this.scriptType='';this.isAttrs=!1;this.attrsNest=[];this.inAttributeName=!0;this.attributeIsType=!1;this.attrValue='';this.indentOf=Infinity;this.indentToken='';this.innerMode=null;this.innerState=null;this.innerModeForLine=!1}
State.prototype.copy=function(){var res=new State();res.javaScriptLine=this.javaScriptLine;res.javaScriptLineExcludesColon=this.javaScriptLineExcludesColon;res.javaScriptArguments=this.javaScriptArguments;res.javaScriptArgumentsDepth=this.javaScriptArgumentsDepth;res.isInterpolating=this.isInterpolating;res.interpolationNesting=this.intpolationNesting;res.jsState=CodeMirror.copyState(jsMode,this.jsState);res.innerMode=this.innerMode;if(this.innerMode&&this.innerState){res.innerState=CodeMirror.copyState(this.innerMode,this.innerState)}
res.restOfLine=this.restOfLine;res.isIncludeFiltered=this.isIncludeFiltered;res.isEach=this.isEach;res.lastTag=this.lastTag;res.scriptType=this.scriptType;res.isAttrs=this.isAttrs;res.attrsNest=this.attrsNest.slice();res.inAttributeName=this.inAttributeName;res.attributeIsType=this.attributeIsType;res.attrValue=this.attrValue;res.indentOf=this.indentOf;res.indentToken=this.indentToken;res.innerModeForLine=this.innerModeForLine;return res};function javaScript(stream,state){if(stream.sol()){state.javaScriptLine=!1;state.javaScriptLineExcludesColon=!1}
if(state.javaScriptLine){if(state.javaScriptLineExcludesColon&&stream.peek()===':'){state.javaScriptLine=!1;state.javaScriptLineExcludesColon=!1;return}
var tok=jsMode.token(stream,state.jsState);if(stream.eol())state.javaScriptLine=!1;return tok||!0}}
function javaScriptArguments(stream,state){if(state.javaScriptArguments){if(state.javaScriptArgumentsDepth===0&&stream.peek()!=='('){state.javaScriptArguments=!1;return}
if(stream.peek()==='('){state.javaScriptArgumentsDepth++}else if(stream.peek()===')'){state.javaScriptArgumentsDepth--}
if(state.javaScriptArgumentsDepth===0){state.javaScriptArguments=!1;return}
var tok=jsMode.token(stream,state.jsState);return tok||!0}}
function yieldStatement(stream){if(stream.match(/^yield\b/)){return 'keyword'}}
function doctype(stream){if(stream.match(/^(?:doctype) *([^\n]+)?/)){return DOCTYPE}}
function interpolation(stream,state){if(stream.match('#{')){state.isInterpolating=!0;state.interpolationNesting=0;return 'punctuation'}}
function interpolationContinued(stream,state){if(state.isInterpolating){if(stream.peek()==='}'){state.interpolationNesting--;if(state.interpolationNesting<0){stream.next();state.isInterpolating=!1;return 'puncutation'}}else if(stream.peek()==='{'){state.interpolationNesting++}
return jsMode.token(stream,state.jsState)||!0}}
function caseStatement(stream,state){if(stream.match(/^case\b/)){state.javaScriptLine=!0;return KEYWORD}}
function when(stream,state){if(stream.match(/^when\b/)){state.javaScriptLine=!0;state.javaScriptLineExcludesColon=!0;return KEYWORD}}
function defaultStatement(stream){if(stream.match(/^default\b/)){return KEYWORD}}
function extendsStatement(stream,state){if(stream.match(/^extends?\b/)){state.restOfLine='string';return KEYWORD}}
function append(stream,state){if(stream.match(/^append\b/)){state.restOfLine='variable';return KEYWORD}}
function prepend(stream,state){if(stream.match(/^prepend\b/)){state.restOfLine='variable';return KEYWORD}}
function block(stream,state){if(stream.match(/^block\b *(?:(prepend|append)\b)?/)){state.restOfLine='variable';return KEYWORD}}
function include(stream,state){if(stream.match(/^include\b/)){state.restOfLine='string';return KEYWORD}}
function includeFiltered(stream,state){if(stream.match(/^include:([a-zA-Z0-9\-]+)/,!1)&&stream.match('include')){state.isIncludeFiltered=!0;return KEYWORD}}
function includeFilteredContinued(stream,state){if(state.isIncludeFiltered){var tok=filter(stream,state);state.isIncludeFiltered=!1;state.restOfLine='string';return tok}}
function mixin(stream,state){if(stream.match(/^mixin\b/)){state.javaScriptLine=!0;return KEYWORD}}
function call(stream,state){if(stream.match(/^\+([-\w]+)/)){if(!stream.match(/^\( *[-\w]+ *=/,!1)){state.javaScriptArguments=!0;state.javaScriptArgumentsDepth=0}
return 'variable'}
if(stream.match(/^\+#{/,!1)){stream.next();state.mixinCallAfter=!0;return interpolation(stream,state)}}
function callArguments(stream,state){if(state.mixinCallAfter){state.mixinCallAfter=!1;if(!stream.match(/^\( *[-\w]+ *=/,!1)){state.javaScriptArguments=!0;state.javaScriptArgumentsDepth=0}
return!0}}
function conditional(stream,state){if(stream.match(/^(if|unless|else if|else)\b/)){state.javaScriptLine=!0;return KEYWORD}}
function each(stream,state){if(stream.match(/^(- *)?(each|for)\b/)){state.isEach=!0;return KEYWORD}}
function eachContinued(stream,state){if(state.isEach){if(stream.match(/^ in\b/)){state.javaScriptLine=!0;state.isEach=!1;return KEYWORD}else if(stream.sol()||stream.eol()){state.isEach=!1}else if(stream.next()){while(!stream.match(/^ in\b/,!1)&&stream.next());return 'variable'}}}
function whileStatement(stream,state){if(stream.match(/^while\b/)){state.javaScriptLine=!0;return KEYWORD}}
function tag(stream,state){var captures;if(captures=stream.match(/^(\w(?:[-:\w]*\w)?)\/?/)){state.lastTag=captures[1].toLowerCase();if(state.lastTag==='script'){state.scriptType='application/javascript'}
return 'tag'}}
function filter(stream,state){if(stream.match(/^:([\w\-]+)/)){var innerMode;if(config&&config.innerModes){innerMode=config.innerModes(stream.current().substring(1))}
if(!innerMode){innerMode=stream.current().substring(1)}
if(typeof innerMode==='string'){innerMode=CodeMirror.getMode(config,innerMode)}
setInnerMode(stream,state,innerMode);return 'atom'}}
function code(stream,state){if(stream.match(/^(!?=|-)/)){state.javaScriptLine=!0;return 'punctuation'}}
function id(stream){if(stream.match(/^#([\w-]+)/)){return ID}}
function className(stream){if(stream.match(/^\.([\w-]+)/)){return CLASS}}
function attrs(stream,state){if(stream.peek()=='('){stream.next();state.isAttrs=!0;state.attrsNest=[];state.inAttributeName=!0;state.attrValue='';state.attributeIsType=!1;return 'punctuation'}}
function attrsContinued(stream,state){if(state.isAttrs){if(ATTRS_NEST[stream.peek()]){state.attrsNest.push(ATTRS_NEST[stream.peek()])}
if(state.attrsNest[state.attrsNest.length-1]===stream.peek()){state.attrsNest.pop()}else if(stream.eat(')')){state.isAttrs=!1;return 'punctuation'}
if(state.inAttributeName&&stream.match(/^[^=,\)!]+/)){if(stream.peek()==='='||stream.peek()==='!'){state.inAttributeName=!1;state.jsState=jsMode.startState();if(state.lastTag==='script'&&stream.current().trim().toLowerCase()==='type'){state.attributeIsType=!0}else{state.attributeIsType=!1}}
return 'attribute'}
var tok=jsMode.token(stream,state.jsState);if(state.attributeIsType&&tok==='string'){state.scriptType=stream.current().toString()}
if(state.attrsNest.length===0&&(tok==='string'||tok==='variable'||tok==='keyword')){try{Function('','var x '+state.attrValue.replace(/,\s*$/,'').replace(/^!/,''));state.inAttributeName=!0;state.attrValue='';stream.backUp(stream.current().length);return attrsContinued(stream,state)}catch(ex){}}
state.attrValue+=stream.current();return tok||!0}}
function attributesBlock(stream,state){if(stream.match(/^&attributes\b/)){state.javaScriptArguments=!0;state.javaScriptArgumentsDepth=0;return 'keyword'}}
function indent(stream){if(stream.sol()&&stream.eatSpace()){return 'indent'}}
function comment(stream,state){if(stream.match(/^ *\/\/(-)?([^\n]*)/)){state.indentOf=stream.indentation();state.indentToken='comment';return 'comment'}}
function colon(stream){if(stream.match(/^: */)){return 'colon'}}
function text(stream,state){if(stream.match(/^(?:\| ?| )([^\n]+)/)){return 'string'}
if(stream.match(/^(<[^\n]*)/,!1)){setInnerMode(stream,state,'htmlmixed');state.innerModeForLine=!0;return innerMode(stream,state,!0)}}
function dot(stream,state){if(stream.eat('.')){var innerMode=null;if(state.lastTag==='script'&&state.scriptType.toLowerCase().indexOf('javascript')!=-1){innerMode=state.scriptType.toLowerCase().replace(/"|'/g,'')}else if(state.lastTag==='style'){innerMode='css'}
setInnerMode(stream,state,innerMode);return 'dot'}}
function fail(stream){stream.next();return null}
function setInnerMode(stream,state,mode){mode=CodeMirror.mimeModes[mode]||mode;mode=config.innerModes?config.innerModes(mode)||mode:mode;mode=CodeMirror.mimeModes[mode]||mode;mode=CodeMirror.getMode(config,mode);state.indentOf=stream.indentation();if(mode&&mode.name!=='null'){state.innerMode=mode}else{state.indentToken='string'}}
function innerMode(stream,state,force){if(stream.indentation()>state.indentOf||(state.innerModeForLine&&!stream.sol())||force){if(state.innerMode){if(!state.innerState){state.innerState=state.innerMode.startState?state.innerMode.startState(stream.indentation()):{}}
return stream.hideFirstChars(state.indentOf+2,function(){return state.innerMode.token(stream,state.innerState)||!0})}else{stream.skipToEnd();return state.indentToken}}else if(stream.sol()){state.indentOf=Infinity;state.indentToken=null;state.innerMode=null;state.innerState=null}}
function restOfLine(stream,state){if(stream.sol()){state.restOfLine=''}
if(state.restOfLine){stream.skipToEnd();var tok=state.restOfLine;state.restOfLine='';return tok}}
function startState(){return new State()}
function copyState(state){return state.copy()}
function nextToken(stream,state){var tok=innerMode(stream,state)||restOfLine(stream,state)||interpolationContinued(stream,state)||includeFilteredContinued(stream,state)||eachContinued(stream,state)||attrsContinued(stream,state)||javaScript(stream,state)||javaScriptArguments(stream,state)||callArguments(stream,state)||yieldStatement(stream,state)||doctype(stream,state)||interpolation(stream,state)||caseStatement(stream,state)||when(stream,state)||defaultStatement(stream,state)||extendsStatement(stream,state)||append(stream,state)||prepend(stream,state)||block(stream,state)||include(stream,state)||includeFiltered(stream,state)||mixin(stream,state)||call(stream,state)||conditional(stream,state)||each(stream,state)||whileStatement(stream,state)||tag(stream,state)||filter(stream,state)||code(stream,state)||id(stream,state)||className(stream,state)||attrs(stream,state)||attributesBlock(stream,state)||indent(stream,state)||text(stream,state)||comment(stream,state)||colon(stream,state)||dot(stream,state)||fail(stream,state);return tok===!0?null:tok}
return{startState:startState,copyState:copyState,token:nextToken}});CodeMirror.defineMIME('text/x-jade','jade')})