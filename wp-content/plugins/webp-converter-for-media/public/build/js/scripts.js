!function(e){var t={};function r(s){if(t[s])return t[s].exports;var i=t[s]={i:s,l:!1,exports:{}};return e[s].call(i.exports,i,i.exports,r),i.l=!0,i.exports}r.m=e,r.c=t,r.d=function(e,t,s){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:s})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var s=Object.create(null);if(r.r(s),Object.defineProperty(s,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)r.d(s,i,function(t){return e[t]}.bind(null,i));return s},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/",r(r.s=0)}([function(e,t,r){r(1),e.exports=r(2)},function(e,t,r){"use strict";function s(e,t){for(var r=0;r<t.length;r++){var s=t[r];s.enumerable=s.enumerable||!1,s.configurable=!0,"value"in s&&(s.writable=!0),Object.defineProperty(e,s.key,s)}}r.r(t);var i=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.setVars()&&this.setEvents()}var t,r,i;return t=e,(r=[{key:"setVars",value:function(){if(this.buttonOpen=document.querySelector('[data-slug="webp-converter-for-media"] a[href*="action=deactivate"]'),this.modal=document.querySelector(".webpModal"),this.buttonOpen&&this.modal)return this.outer=this.modal.querySelector(".webpModal__outer"),this.form=this.outer.querySelector(".webpModal__form"),this.formOptions=this.form.querySelectorAll('[name="webpc_reason"]'),this.formComment=this.form.querySelector('[name="webpc_comment"]'),this.buttonSubmit=this.form.querySelector('button[type="submit"]'),this.buttonCancel=this.form.querySelector('button[type="button"]'),this.events={openModal:this.openModal.bind(this)},this.atts={optionPlaceholder:"data-placeholder"},!0}},{key:"setEvents",value:function(){var e=this;this.buttonOpen.addEventListener("click",this.events.openModal),this.buttonSubmit.addEventListener("click",this.submitForm.bind(this)),this.buttonCancel.addEventListener("click",this.cancelForm.bind(this)),this.outer.addEventListener("click",this.closeModal.bind(this)),this.form.addEventListener("click",(function(e){e.stopPropagation()}));for(var t=this.formOptions.length,r=function(t){e.formOptions[t].addEventListener("change",(function(){e.setCurrentOption(t)}))},s=0;s<t;s++)r(s)}},{key:"openModal",value:function(e){e.preventDefault(),this.buttonOpen.removeEventListener("click",this.events.openModal),this.modal.removeAttribute("hidden")}},{key:"closeModal",value:function(){this.modal.setAttribute("hidden","hidden")}},{key:"submitForm",value:function(e){var t=this;e.preventDefault(),this.closeModal(),setTimeout((function(){var e=new FormData(t.form),r=t.form.getAttribute("action"),s=new XMLHttpRequest;s.open("POST",r,!0),s.send(e),t.buttonOpen.click()}),0)}},{key:"cancelForm",value:function(e){var t=this;e.preventDefault(),this.closeModal(),setTimeout((function(){t.buttonOpen.click()}),0)}},{key:"setCurrentOption",value:function(e){this.formComment.value="";var t=this.formOptions[e].getAttribute(this.atts.optionPlaceholder);this.formComment.setAttribute("placeholder",t)}}])&&s(t.prototype,r),i&&s(t,i),e}();function n(e,t){for(var r=0;r<t.length;r++){var s=t[r];s.enumerable=s.enumerable||!1,s.configurable=!0,"value"in s&&(s.writable=!0),Object.defineProperty(e,s.key,s)}}var o=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.setVars()&&this.setEvents()}var t,r,s;return t=e,(r=[{key:"setVars",value:function(){if(this.notice=document.querySelector(".notice[data-notice=webp-converter]"),this.notice)return this.settings={ajaxUrl:this.notice.getAttribute("data-url"),ajaxAction:"webpc_notice",buttonCloseClass:".notice[data-notice=webp-converter] .notice-dismiss",buttonHideClass:".notice[data-notice=webp-converter] [data-permanently]"},this.status={isHidden:!1},!0}},{key:"setEvents",value:function(){var e=this,t=this.settings,r=t.buttonCloseClass,s=t.buttonHideClass;window.addEventListener("click",(function(t){t.target.matches(r)?e.hideNotice(!1):t.target.matches(s)&&(t.preventDefault(),e.hideNotice(!0))}))}},{key:"hideNotice",value:function(e){if(!this.status.isHidden){this.status.isHidden=!0;var t=this.settings,r=t.ajaxUrl,s=t.ajaxAction,i=t.buttonCloseClass;jQuery.ajax(r,{type:"POST",data:{action:s,is_permanently:e?1:0}}),document.querySelector(i).click()}}}])&&n(t.prototype,r),s&&n(t,s),e}();function a(e,t){for(var r=0;r<t.length;r++){var s=t[r];s.enumerable=s.enumerable||!1,s.configurable=!0,"value"in s&&(s.writable=!0),Object.defineProperty(e,s.key,s)}}var u=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.setVars()&&this.setEvents()}var t,r,s;return t=e,(r=[{key:"setVars",value:function(){if(this.section=document.querySelector(".webpLoader"),this.section)return this.wrapper=this.section.querySelector(".webpLoader__status"),this.progress=this.wrapper.querySelector(".webpLoader__barProgress"),this.progressSize=this.section.querySelector(".webpLoader__sizeProgress"),this.errors=this.section.querySelector(".webpLoader__errors"),this.errorsInner=this.errors.querySelector(".webpLoader__errorsContentList"),this.errorsMessage=this.errors.querySelector(".webpLoader__errorsContentMessage"),this.success=this.section.querySelector(".webpLoader__success"),this.succesPopup=this.section.querySelector(".webpLoader__popup"),this.inputOptions=this.section.querySelectorAll('input[type="checkbox"]'),this.button=this.section.querySelector(".webpLoader__button"),this.data={count:0,max:0,items:[],size:{before:0,after:0},errors:[]},this.settings={isDisabled:!1,ajax:{urlPaths:this.section.getAttribute("data-api-paths"),urlRegenerate:this.section.getAttribute("data-api-regenerate"),errorMessage:this.section.getAttribute("data-api-error-message")},units:["kB","MB","GB"]},this.atts={progress:"data-percent"},this.classes={progressError:"webpLoader__barProgress--error",buttonDisabled:"webpLoader__button--disabled"},!0}},{key:"setEvents",value:function(){this.button.addEventListener("click",this.initRegenerate.bind(this))}},{key:"initRegenerate",value:function(e){if(e.preventDefault(),!this.settings.isDisabled){this.settings.isDisabled=!0,this.button.classList.add(this.classes.buttonDisabled);for(var t=this.inputOptions.length,r=0;r<t;r++)this.inputOptions[r].setAttribute("disabled",!0);this.wrapper.removeAttribute("hidden"),this.getImagesList()}}},{key:"getImagesList",value:function(){var e=this;jQuery.ajax(this.settings.ajax.urlPaths,{type:"POST",data:this.getDataForPathsRequest()}).done((function(t){e.data.items=t,e.data.max=t.length,e.regenerateNextImages()})).fail((function(){e.progress.classList.add(e.classes.progressError),e.errorsMessage.removeAttribute("hidden"),e.errors.removeAttribute("hidden")}))}},{key:"getDataForPathsRequest",value:function(){for(var e={},t=this.inputOptions.length,r=0;r<t;r++)e[this.inputOptions[r].getAttribute("name")]=this.inputOptions[r].checked?1:0;return e}},{key:"regenerateNextImages",value:function(){if(0===this.data.max&&this.updateProgress(),!(this.data.count>=this.data.max)){var e=this.data.items[this.data.count];this.data.count++,this.sendRequest(e)}}},{key:"sendRequest",value:function(e){var t=this;jQuery.ajax(this.settings.ajax.urlRegenerate,{type:"POST",data:{paths:e}}).done((function(e){t.updateErrors(e.errors),t.updateSize(e),t.updateProgress(),t.regenerateNextImages()})).fail((function(){var r=JSON.stringify(e),s=t.settings.ajax.errorMessage.replace("%s","<code>".concat(r,"</code>"));t.updateErrors([s]),t.regenerateNextImages()}))}},{key:"updateErrors",value:function(e){0!==e.length&&(this.data.errors=this.data.errors.concat(e),this.errorsInner.innerHTML=this.data.errors.join("<br>"),this.errors.removeAttribute("hidden"))}},{key:"updateSize",value:function(e){var t=this.data.size;t.before+=e.size.before,t.after+=e.size.after;var r=t.before-t.after;if(r<0&&(r=0),0!==r){var s=Math.round(100*(1-t.after/t.before));s<0&&(s=0);var i=-1;do{i++,r/=1024}while(r>1024);var n=r.toFixed(2),o=this.settings.units[i],a="".concat(n," ").concat(o," (").concat(s,"%)");this.progressSize.innerHTML=a}}},{key:"updateProgress",value:function(){var e=this.data.max>0?Math.floor(this.data.count/this.data.max*100):100;e>100&&(e=100),100===e&&(this.success.removeAttribute("hidden"),this.succesPopup.removeAttribute("hidden")),this.progress.setAttribute(this.atts.progress,e)}}])&&a(t.prototype,r),s&&a(t,s),e}();new function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),new i,new o,new u}},function(e,t){}]);