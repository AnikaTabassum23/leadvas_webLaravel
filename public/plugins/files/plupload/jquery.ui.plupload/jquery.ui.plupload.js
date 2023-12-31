(function(window,document,plupload,o,$){var uploaders={};function _(str){return plupload.translate(str)||str}
function renderUI(obj){obj.id=obj.attr('id');obj.html('<div class="plupload_wrapper">'+'<div class="ui-widget-content plupload_container">'+'<div class="ui-state-default ui-widget-header plupload_header">'+'<div class="plupload_header_content">'+'<div class="plupload_logo"> </div>'+'<div class="plupload_header_title">'+_("Select files")+'</div>'+'<div class="plupload_header_text">'+_("Add files to the upload queue and click the start button.")+'</div>'+'<div class="plupload_view_switch">'+'<input type="radio" id="'+obj.id+'_view_list" name="view_mode_'+obj.id+'" checked="checked" /><label class="plupload_button" for="'+obj.id+'_view_list" data-view="list">'+_('List')+'</label>'+'<input type="radio" id="'+obj.id+'_view_thumbs" name="view_mode_'+obj.id+'" /><label class="plupload_button"  for="'+obj.id+'_view_thumbs" data-view="thumbs">'+_('Thumbnails')+'</label>'+'</div>'+'</div>'+'</div>'+'<table class="plupload_filelist plupload_filelist_header ui-widget-header">'+'<tr>'+'<td class="plupload_cell plupload_file_name">'+_('Filename')+'</td>'+'<td class="plupload_cell plupload_file_status">'+_('Status')+'</td>'+'<td class="plupload_cell plupload_file_size">'+_('Size')+'</td>'+'<td class="plupload_cell plupload_file_action">&nbsp;</td>'+'</tr>'+'</table>'+'<div class="plupload_content">'+'<div class="plupload_droptext">'+_("Drag files here.")+'</div>'+'<ul class="plupload_filelist_content"> </ul>'+'<div class="plupload_clearer">&nbsp;</div>'+'</div>'+'<table class="plupload_filelist plupload_filelist_footer ui-widget-header">'+'<tr>'+'<td class="plupload_cell plupload_file_name">'+'<div class="plupload_buttons"><!-- Visible -->'+'<a class="plupload_button plupload_add">'+_("Add Files")+'</a>&nbsp;'+'<a class="plupload_button plupload_start">'+_("Start Upload")+'</a>&nbsp;'+'<a class="plupload_button plupload_stop plupload_hidden">'+_("Stop Upload")+'</a>&nbsp;'+'</div>'+'<div class="plupload_started plupload_hidden"><!-- Hidden -->'+'<div class="plupload_progress plupload_right">'+'<div class="plupload_progress_container"></div>'+'</div>'+'<div class="plupload_cell plupload_upload_status"></div>'+'<div class="plupload_clearer">&nbsp;</div>'+'</div>'+'</td>'+'<td class="plupload_file_status"><span class="plupload_total_status">0%</span></td>'+'<td class="plupload_file_size"><span class="plupload_total_file_size">0 kb</span></td>'+'<td class="plupload_file_action"></td>'+'</tr>'+'</table>'+'</div>'+'<input class="plupload_count" value="0" type="hidden">'+'</div>')}
$.widget("ui.plupload",{widgetEventPrefix:'',contents_bak:'',options:{browse_button_hover:'ui-state-hover',browse_button_active:'ui-state-active',filters:{},buttons:{browse:!0,start:!0,stop:!0},views:{list:!0,thumbs:!1,active:'list',remember:!0},thumb_width:100,thumb_height:60,multiple_queues:!0,dragdrop:!0,autostart:!1,sortable:!1,rename:!1},FILE_COUNT_ERROR:-9001,_create:function(){var id=this.element.attr('id');if(!id){id=plupload.guid();this.element.attr('id',id)}
this.id=id;this.contents_bak=this.element.html();renderUI(this.element);this.container=$('.plupload_container',this.element).attr('id',id+'_container');this.content=$('.plupload_content',this.element);if($.fn.resizable){this.container.resizable({handles:'s',minHeight:300})}
this.filelist=$('.plupload_filelist_content',this.container).attr({id:id+'_filelist',unselectable:'on'});this.browse_button=$('.plupload_add',this.container).attr('id',id+'_browse');this.start_button=$('.plupload_start',this.container).attr('id',id+'_start');this.stop_button=$('.plupload_stop',this.container).attr('id',id+'_stop');this.thumbs_switcher=$('#'+id+'_view_thumbs');this.list_switcher=$('#'+id+'_view_list');if($.ui.button){this.browse_button.button({icons:{primary:'ui-icon-circle-plus'},disabled:!0});this.start_button.button({icons:{primary:'ui-icon-circle-arrow-e'},disabled:!0});this.stop_button.button({icons:{primary:'ui-icon-circle-close'}});this.list_switcher.button({text:!1,icons:{secondary:"ui-icon-grip-dotted-horizontal"}});this.thumbs_switcher.button({text:!1,icons:{secondary:"ui-icon-image"}})}
this.progressbar=$('.plupload_progress_container',this.container);if($.ui.progressbar){this.progressbar.progressbar()}
this.counter=$('.plupload_count',this.element).attr({id:id+'_count',name:id+'_count'});this._initUploader()},_initUploader:function(){var self=this,id=this.id,uploader,options={container:id+'_buttons',browse_button:id+'_browse'};$('.plupload_buttons',this.element).attr('id',id+'_buttons');if(self.options.dragdrop){this.filelist.parent().attr('id',this.id+'_dropbox');options.drop_element=this.id+'_dropbox'}
this.filelist.on('click',function(e){if($(e.target).hasClass('plupload_action_icon')){self.removeFile($(e.target).closest('.plupload_file').attr('id'));e.preventDefault()}});uploader=this.uploader=uploaders[id]=new plupload.Uploader($.extend(this.options,options));if(self.options.views.thumbs){uploader.settings.required_features.display_media=!0}
if(self.options.max_file_count){plupload.extend(uploader.getOption('filters'),{max_file_count:self.options.max_file_count})}
plupload.addFileFilter('max_file_count',function(maxCount,file,cb){if(maxCount<=this.files.length-(this.total.uploaded+this.total.failed)){self.browse_button.button('disable');this.disableBrowse();this.trigger('Error',{code:self.FILE_COUNT_ERROR,message:_("File count error."),file:file});cb(!1)}else{cb(!0)}});uploader.bind('Error',function(up,err){var message,details="";message='<strong>'+err.message+'</strong>';switch(err.code){case plupload.FILE_EXTENSION_ERROR:details=o.sprintf(_("File: %s"),err.file.name);break;case plupload.FILE_SIZE_ERROR:details=o.sprintf(_("File: %s, size: %d, max file size: %d"),err.file.name,plupload.formatSize(err.file.size),plupload.formatSize(plupload.parseSize(up.getOption('filters').max_file_size)));break;case plupload.FILE_DUPLICATE_ERROR:details=o.sprintf(_("%s already present in the queue."),err.file.name);break;case self.FILE_COUNT_ERROR:details=o.sprintf(_("Upload element accepts only %d file(s) at a time. Extra files were stripped."),up.getOption('filters').max_file_count||0);break;case plupload.IMAGE_FORMAT_ERROR:details=_("Image format either wrong or not supported.");break;case plupload.IMAGE_MEMORY_ERROR:details=_("Runtime ran out of available memory.");break;case plupload.HTTP_ERROR:details=_("Upload URL might be wrong or doesn't exist.");break}
message+=" <br /><i>"+details+"</i>";self._trigger('error',null,{up:up,error:err});if(err.code===plupload.INIT_ERROR){setTimeout(function(){self.destroy()},1)}else{self.notify('error',message)}});uploader.bind('PostInit',function(up){if(!self.options.buttons.browse){self.browse_button.button('disable').hide();up.disableBrowse(!0)}else{self.browse_button.button('enable')}
if(!self.options.buttons.start){self.start_button.button('disable').hide()}
if(!self.options.buttons.stop){self.stop_button.button('disable').hide()}
if(!self.options.unique_names&&self.options.rename){self._enableRenaming()}
if(self.options.dragdrop&&up.features.dragdrop){self.filelist.parent().addClass('plupload_dropbox')}
self._enableViewSwitcher();self.start_button.click(function(e){if(!$(this).button('option','disabled')){self.start()}
e.preventDefault()});self.stop_button.click(function(e){self.stop();e.preventDefault()});self._trigger('ready',null,{up:up})});uploader.init();uploader.bind('FileFiltered',function(up,file){self._addFiles(file)});uploader.bind('FilesAdded',function(up,files){self._trigger('selected',null,{up:up,files:files});if(self.options.sortable&&$.ui.sortable){self._enableSortingList()}
self._trigger('updatelist',null,{filelist:self.filelist});if(self.options.autostart){setTimeout(function(){self.start()},10)}});uploader.bind('FilesRemoved',function(up,files){if($.ui.sortable&&self.options.sortable){$('tbody',self.filelist).sortable('destroy')}
$.each(files,function(i,file){$('#'+file.id).toggle("highlight",function(){$(this).remove()})});if(up.files.length){if(self.options.sortable&&$.ui.sortable){self._enableSortingList()}}
self._trigger('updatelist',null,{filelist:self.filelist});self._trigger('removed',null,{up:up,files:files})});uploader.bind('QueueChanged StateChanged',function(){self._handleState()});uploader.bind('UploadFile',function(up,file){self._handleFileStatus(file)});uploader.bind('FileUploaded',function(up,file){self._handleFileStatus(file);self._trigger('uploaded',null,{up:up,file:file})});uploader.bind('UploadProgress',function(up,file){self._handleFileStatus(file);self._updateTotalProgress();self._trigger('progress',null,{up:up,file:file})});uploader.bind('UploadComplete',function(up,files){self._addFormFields();self._trigger('complete',null,{up:up,files:files})})},_setOption:function(key,value){var self=this;if(key=='buttons'&&typeof(value)=='object'){value=$.extend(self.options.buttons,value);if(!value.browse){self.browse_button.button('disable').hide();self.uploader.disableBrowse(!0)}else{self.browse_button.button('enable').show();self.uploader.disableBrowse(!1)}
if(!value.start){self.start_button.button('disable').hide()}else{self.start_button.button('enable').show()}
if(!value.stop){self.stop_button.button('disable').hide()}else{self.start_button.button('enable').show()}}
self.uploader.settings[key]=value},start:function(){this.uploader.start();this._trigger('start',null,{up:this.uploader})},stop:function(){this.uploader.stop();this._trigger('stop',null,{up:this.uploader})},enable:function(){this.browse_button.button('enable');this.uploader.disableBrowse(!1)},disable:function(){this.browse_button.button('disable');this.uploader.disableBrowse(!0)},getFile:function(id){var file;if(typeof id==='number'){file=this.uploader.files[id]}else{file=this.uploader.getFile(id)}
return file},getFiles:function(){return this.uploader.files},removeFile:function(file){if(plupload.typeOf(file)==='string'){file=this.getFile(file)}
this.uploader.removeFile(file)},clearQueue:function(){this.uploader.splice()},getUploader:function(){return this.uploader},refresh:function(){this.uploader.refresh()},notify:function(type,message){var popup=$('<div class="plupload_message">'+'<span class="plupload_message_close ui-icon ui-icon-circle-close" title="'+_('Close')+'"></span>'+'<p><span class="ui-icon"></span>'+message+'</p>'+'</div>');popup.addClass('ui-state-'+(type==='error'?'error':'highlight')).find('p .ui-icon').addClass('ui-icon-'+(type==='error'?'alert':'info')).end().find('.plupload_message_close').click(function(){popup.remove()}).end();$('.plupload_header',this.container).append(popup)},destroy:function(){this.uploader.destroy();$('.plupload_button',this.element).unbind();if($.ui.button){$('.plupload_add, .plupload_start, .plupload_stop',this.container).button('destroy')}
if($.ui.progressbar){this.progressbar.progressbar('destroy')}
if($.ui.sortable&&this.options.sortable){$('tbody',this.filelist).sortable('destroy')}
this.element.empty().html(this.contents_bak);this.contents_bak='';$.Widget.prototype.destroy.apply(this)},_handleState:function(){var up=this.uploader,filesPending=up.files.length-(up.total.uploaded+up.total.failed),maxCount=up.getOption('filters').max_file_count||0;if(plupload.STARTED===up.state){$([]).add(this.stop_button).add('.plupload_started').removeClass('plupload_hidden');this.start_button.button('disable');if(!this.options.multiple_queues){this.browse_button.button('disable');up.disableBrowse()}
$('.plupload_upload_status',this.element).html(o.sprintf(_('Uploaded %d/%d files'),up.total.uploaded,up.files.length));$('.plupload_header_content',this.element).addClass('plupload_header_content_bw')}
else if(plupload.STOPPED===up.state){$([]).add(this.stop_button).add('.plupload_started').addClass('plupload_hidden');if(filesPending){this.start_button.button('enable')}else{this.start_button.button('disable')}
if(this.options.multiple_queues){$('.plupload_header_content',this.element).removeClass('plupload_header_content_bw')}
if(this.options.multiple_queues&&maxCount&&maxCount>filesPending){this.browse_button.button('enable');up.disableBrowse(!1)}
this._updateTotalProgress()}
if(up.total.queued===0){$('.ui-button-text',this.browse_button).html(_('Add Files'))}else{$('.ui-button-text',this.browse_button).html(o.sprintf(_('%d files queued'),up.total.queued))}
up.refresh()},_handleFileStatus:function(file){var $file=$('#'+file.id),actionClass,iconClass;if(!$file.length){return}
switch(file.status){case plupload.DONE:actionClass='plupload_done';iconClass='plupload_action_icon ui-icon ui-icon-circle-check';break;case plupload.FAILED:actionClass='ui-state-error plupload_failed';iconClass='plupload_action_icon ui-icon ui-icon-alert';break;case plupload.QUEUED:actionClass='plupload_delete';iconClass='plupload_action_icon ui-icon ui-icon-circle-minus';break;case plupload.UPLOADING:actionClass='ui-state-highlight plupload_uploading';iconClass='plupload_action_icon ui-icon ui-icon-circle-arrow-w';var scroller=$('.plupload_scroll',this.container),scrollTop=scroller.scrollTop(),scrollerHeight=scroller.height(),rowOffset=$file.position().top+$file.height();if(scrollerHeight<rowOffset){scroller.scrollTop(scrollTop+rowOffset-scrollerHeight)}
$file.find('.plupload_file_percent').html(file.percent+'%').end().find('.plupload_file_progress').css('width',file.percent+'%').end().find('.plupload_file_size').html(plupload.formatSize(file.size));break}
actionClass+=' ui-state-default plupload_file';$file.attr('class',actionClass).find('.plupload_action_icon').attr('class',iconClass)},_updateTotalProgress:function(){var up=this.uploader;this.filelist[0].scrollTop=this.filelist[0].scrollHeight;this.progressbar.progressbar('value',up.total.percent);this.element.find('.plupload_total_status').html(up.total.percent+'%').end().find('.plupload_total_file_size').html(plupload.formatSize(up.total.size)).end().find('.plupload_upload_status').html(o.sprintf(_('Uploaded %d/%d files'),up.total.uploaded,up.files.length))},_displayThumbs:function(){var self=this,tw,th,cols,num=0,thumbs=[],loading=!1;if(!this.options.views.thumbs){return}
function onLast(el,eventName,cb){var timer;el.on(eventName,function(){clearTimeout(timer);timer=setTimeout(function(){clearTimeout(timer);cb()},300)})}
function measure(){if(!tw||!th){var wrapper=$('.plupload_file:eq(0)',self.filelist);tw=wrapper.outerWidth(!0);th=wrapper.outerHeight(!0)}
var aw=self.content.width(),ah=self.content.height();cols=Math.floor(aw/tw);num=cols*(Math.ceil(ah/th)+1)}
function pickThumbsToLoad(){var startIdx=Math.floor(self.content.scrollTop()/th)*cols;thumbs=$('.plupload_file',self.filelist).slice(startIdx,startIdx+num).filter('.plupload_file_loading').get()}
function init(){function mpl(){if(self.view_mode!=='thumbs'){return}
measure();pickThumbsToLoad();lazyLoad()}
if($.fn.resizable){onLast(self.container,'resize',mpl)}
onLast(self.window,'resize',mpl);onLast(self.content,'scroll',mpl);self.element.on('viewchanged selected',mpl);mpl()}
function preloadThumb(file,cb){var img=new o.Image();img.onload=function(){var thumb=$('#'+file.id+' .plupload_file_thumb',self.filelist).html('');this.embed(thumb[0],{width:self.options.thumb_width,height:self.options.thumb_height,crop:!0,swf_url:o.resolveUrl(self.options.flash_swf_url),xap_url:o.resolveUrl(self.options.silverlight_xap_url)})};img.bind("embedded error",function(){$('#'+file.id,self.filelist).removeClass('plupload_file_loading');this.destroy();setTimeout(cb,1)});img.load(file.getSource())}
function lazyLoad(){if(self.view_mode!=='thumbs'||loading){return}
pickThumbsToLoad();if(!thumbs.length){return}
loading=!0;preloadThumb(self.getFile($(thumbs.shift()).attr('id')),function(){loading=!1;lazyLoad()})}
this.element.on('selected',function onselected(){self.element.off('selected',onselected);init()})},_addFiles:function(files){var self=this,file_html,html='';file_html='<li class="plupload_file ui-state-default plupload_file_loading plupload_delete" id="%id%" style="width:%thumb_width%px;">'+'<div class="plupload_file_thumb" style="width:%thumb_width%px;height:%thumb_height%px;">'+'<div class="plupload_file_dummy ui-widget-content" style="line-height:%thumb_height%px;"><span class="ui-state-disabled">%ext% </span></div>'+'</div>'+'<div class="plupload_file_status">'+'<div class="plupload_file_progress ui-widget-header" style="width: 0%"> </div>'+'<span class="plupload_file_percent">%percent% </span>'+'</div>'+'<div class="plupload_file_name" title="%name%">'+'<span class="plupload_file_name_wrapper">%name% </span>'+'</div>'+'<div class="plupload_file_action">'+'<div class="plupload_action_icon ui-icon ui-icon-circle-minus"> </div>'+'</div>'+'<div class="plupload_file_size">%size% </div>'+'<div class="plupload_file_fields"> </div>'+'</li>';if(plupload.typeOf(files)!=='array'){files=[files]}
$.each(files,function(i,file){var ext=o.Mime.getFileExtension(file.name)||'none';html+=file_html.replace(/%(\w+)%/g,function($0,$1){switch($1){case 'thumb_width':case 'thumb_height':return self.options[$1];case 'size':return plupload.formatSize(file.size);case 'ext':return ext;default:return file[$1]||''}})});self.filelist.append(html)},_addFormFields:function(){var self=this;$('.plupload_file_fields',this.filelist).html('');plupload.each(this.uploader.files,function(file,count){var fields='',id=self.id+'_'+count;if(file.target_name){fields+='<input type="hidden" name="'+id+'_tmpname" value="'+plupload.xmlEncode(file.target_name)+'" />'}
fields+='<input type="hidden" name="'+id+'_name" value="'+plupload.xmlEncode(file.name)+'" />';fields+='<input type="hidden" name="'+id+'_status" value="'+(file.status===plupload.DONE?'done':'failed')+'" />';$('#'+file.id).find('.plupload_file_fields').html(fields)});this.counter.val(this.uploader.files.length)},_viewChanged:function(view){if(this.options.views.remember&&$.cookie){$.cookie('plupload_ui_view',view,{expires:7,path:'/'})}
if(o.Env.browser==='IE'&&o.Env.version<7){this.content.attr('style','height:expression(document.getElementById("'+this.id+'_container'+'").clientHeight - '+(view==='list'?132:102)+')')}
this.container.removeClass('plupload_view_list plupload_view_thumbs').addClass('plupload_view_'+view);this.view_mode=view;this._trigger('viewchanged',null,{view:view})},_enableViewSwitcher:function(){var self=this,view,switcher=$('.plupload_view_switch',this.container),buttons,button;plupload.each(['list','thumbs'],function(view){if(!self.options.views[view]){switcher.find('[for="'+self.id+'_view_'+view+'"], #'+self.id+'_view_'+view).remove()}});buttons=switcher.find('.plupload_button');if(buttons.length===1){switcher.hide();view=buttons.eq(0).data('view');this._viewChanged(view)}else if($.ui.button&&buttons.length>1){if(this.options.views.remember&&$.cookie){view=$.cookie('plupload_ui_view')}
if(!~plupload.inArray(view,['list','thumbs'])){view=this.options.views.active}
switcher.show().buttonset().find('.ui-button').click(function(e){view=$(this).data('view');self._viewChanged(view);e.preventDefault()});button=switcher.find('[for="'+self.id+'_view_'+view+'"]');if(button.length){button.trigger('click')}}else{switcher.show();this._viewChanged(this.options.views.active)}
if(this.options.views.thumbs){this._displayThumbs()}},_enableRenaming:function(){var self=this;this.filelist.dblclick(function(e){var nameSpan=$(e.target),nameInput,file,parts,name,ext="";if(!nameSpan.hasClass('plupload_file_name_wrapper')){return}
file=self.uploader.getFile(nameSpan.closest('.plupload_file')[0].id);name=file.name;parts=/^(.+)(\.[^.]+)$/.exec(name);if(parts){name=parts[1];ext=parts[2]}
nameInput=$('<input class="plupload_file_rename" type="text" />').width(nameSpan.width()).insertAfter(nameSpan.hide());nameInput.val(name).blur(function(){nameSpan.show().parent().scrollLeft(0).end().next().remove()}).keydown(function(e){var nameInput=$(this);if($.inArray(e.keyCode,[13,27])!==-1){e.preventDefault();if(e.keyCode===13){file.name=nameInput.val()+ext;nameSpan.html(file.name)}
nameInput.blur()}})[0].focus()})},_enableSortingList:function(){var self=this;if($('.plupload_file',this.filelist).length<2){return}
$('tbody',this.filelist).sortable('destroy');this.filelist.sortable({items:'.plupload_delete',cancel:'object, .plupload_clearer',stop:function(){var files=[];$.each($(this).sortable('toArray'),function(i,id){files[files.length]=self.uploader.getFile(id)});files.unshift(files.length);files.unshift(0);Array.prototype.splice.apply(self.uploader.files,files)}})}})}(window,document,plupload,mOxie,jQuery))