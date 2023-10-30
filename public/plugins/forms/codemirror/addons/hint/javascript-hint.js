(function(mod){if(typeof exports=="object"&&typeof module=="object")
mod(require("../../lib/codemirror"));else if(typeof define=="function"&&define.amd)
define(["../../lib/codemirror"],mod);else mod(CodeMirror)})(function(CodeMirror){var Pos=CodeMirror.Pos;function forEach(arr,f){for(var i=0,e=arr.length;i<e;++i)f(arr[i]);}
function arrayContains(arr,item){if(!Array.prototype.indexOf){var i=arr.length;while(i--){if(arr[i]===item){return!0}}
return!1}
return arr.indexOf(item)!=-1}
function scriptHint(editor,keywords,getToken,options){var cur=editor.getCursor(),token=getToken(editor,cur),tprop=token;if(/\b(?:string|comment)\b/.test(token.type))return;token.state=CodeMirror.innerMode(editor.getMode(),token.state).state;if(!/^[\w$_]*$/.test(token.string)){token=tprop={start:cur.ch,end:cur.ch,string:"",state:token.state,type:token.string=="."?"property":null}}
while(tprop.type=="property"){tprop=getToken(editor,Pos(cur.line,tprop.start));if(tprop.string!=".")return;tprop=getToken(editor,Pos(cur.line,tprop.start));if(!context)var context=[];context.push(tprop)}
return{list:getCompletions(token,context,keywords,options),from:Pos(cur.line,token.start),to:Pos(cur.line,token.end)}}
function javascriptHint(editor,options){return scriptHint(editor,javascriptKeywords,function(e,cur){return e.getTokenAt(cur)},options)};CodeMirror.registerHelper("hint","javascript",javascriptHint);function getCoffeeScriptToken(editor,cur){var token=editor.getTokenAt(cur);if(cur.ch==token.start+1&&token.string.charAt(0)=='.'){token.end=token.start;token.string='.';token.type="property"}
else if(/^\.[\w$_]*$/.test(token.string)){token.type="property";token.start++;token.string=token.string.replace(/\./,'')}
return token}
function coffeescriptHint(editor,options){return scriptHint(editor,coffeescriptKeywords,getCoffeeScriptToken,options)}
CodeMirror.registerHelper("hint","coffeescript",coffeescriptHint);var stringProps=("charAt charCodeAt indexOf lastIndexOf substring substr slice trim trimLeft trimRight "+"toUpperCase toLowerCase split concat match replace search").split(" ");var arrayProps=("length concat join splice push pop shift unshift slice reverse sort indexOf "+"lastIndexOf every some filter forEach map reduce reduceRight ").split(" ");var funcProps="prototype apply call bind".split(" ");var javascriptKeywords=("break case catch continue debugger default delete do else false finally for function "+"if in instanceof new null return switch throw true try typeof var void while with").split(" ");var coffeescriptKeywords=("and break catch class continue delete do else extends false finally for "+"if in instanceof isnt new no not null of off on or return switch then throw true try typeof until void while with yes").split(" ");function getCompletions(token,context,keywords,options){var found=[],start=token.string,global=options&&options.globalScope||window;function maybeAdd(str){if(str.lastIndexOf(start,0)==0&&!arrayContains(found,str))found.push(str)}
function gatherCompletions(obj){if(typeof obj=="string")forEach(stringProps,maybeAdd);else if(obj instanceof Array)forEach(arrayProps,maybeAdd);else if(obj instanceof Function)forEach(funcProps,maybeAdd);for(var name in obj)maybeAdd(name)}
if(context&&context.length){var obj=context.pop(),base;if(obj.type&&obj.type.indexOf("variable")===0){if(options&&options.additionalContext)
base=options.additionalContext[obj.string];if(!options||options.useGlobalScope!==!1)
base=base||global[obj.string]}else if(obj.type=="string"){base=""}else if(obj.type=="atom"){base=1}else if(obj.type=="function"){if(global.jQuery!=null&&(obj.string=='$'||obj.string=='jQuery')&&(typeof global.jQuery=='function'))
base=global.jQuery();else if(global._!=null&&(obj.string=='_')&&(typeof global._=='function'))
base=global._()}
while(base!=null&&context.length)
base=base[context.pop().string];if(base!=null)gatherCompletions(base)}else{for(var v=token.state.localVars;v;v=v.next)maybeAdd(v.name);for(var v=token.state.globalVars;v;v=v.next)maybeAdd(v.name);if(!options||options.useGlobalScope!==!1)
gatherCompletions(global);forEach(keywords,maybeAdd)}
return found}})