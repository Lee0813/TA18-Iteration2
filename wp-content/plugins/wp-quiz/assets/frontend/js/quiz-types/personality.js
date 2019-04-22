"use strict";var _createClass=function(){function r(t,e){for(var i=0;i<e.length;i++){var r=e[i];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}return function(t,e,i){return e&&r(t.prototype,e),i&&r(t,i),t}}(),_get=function t(e,i,r){null===e&&(e=Function.prototype);var n=Object.getOwnPropertyDescriptor(e,i);if(void 0===n){var s=Object.getPrototypeOf(e);return null===s?void 0:t(s,i,r)}if("value"in n)return n.value;var a=n.get;return void 0!==a?a.call(r):void 0};function _classCallCheck(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function _possibleConstructorReturn(t,e){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!e||"object"!=typeof e&&"function"!=typeof e?t:e}function _inherits(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}!function(r,n){var e=function(t){function a(){return _classCallCheck(this,a),_possibleConstructorReturn(this,(a.__proto__||Object.getPrototypeOf(a)).apply(this,arguments))}return _inherits(a,r.Quiz),_createClass(a,[{key:"isShowNextButton",value:function(){return!1}},{key:"addPoint",value:function(t,e){this.points[t]||(this.points[t]=0),this.points[t]+=parseInt(e)}},{key:"afterClickAnswer",value:function(t,e){_get(a.prototype.__proto__||Object.getPrototypeOf(a.prototype),"afterClickAnswer",this).call(this,t,e);var i=t.attr("data-id"),r=e.attr("data-index"),n=this.questions[r].answers[i];for(var s in n.results)this.addPoint(s,n.results[s])}},{key:"findResultId",value:function(){var t=0,e="";for(var i in this.points)this.points[i]>t&&(t=this.points[i],e=i);this.resultId=e,this.result=this.quizData.results[this.resultId]}},{key:"trackAnswer",value:function(t){var e=t.attr("data-index"),i=this.questions[e],r={answers:[]};t.find(".wq-answer.chosen").each(function(t,e){return r.answers.push(e.dataset.id)}),this.tracker[i.id]=r}},{key:"showResult",value:function(){var t=this;if(this.result.redirect_url)setTimeout(function(){window.location.href=t.result.redirect_url},500);else{var e=this.$wrapper.find(".wq-results"),i=this.$wrapper.find('.wq-result[data-id="'+this.resultId+'"]'),r=this.$wrapper.find('.wq-question[data-index="'+this.lastQuestionIndex+'"]');i.show(),"multiple"===this.settings.question_layout&&r.is(":visible")?r.animateCss(this.settings.animation_out,function(){r.hide();r.offset().top;r.hide(),e.show().animateCss(t.settings.animation_in)}):e.show()}}},{key:"savePlayData",value:function(){var e=this,t=r.restUrl+"wp-quiz/v2/play_data",i=r.helpers.getRequest({url:t,method:"POST",data:{quiz_id:this.quizId,quiz_data:this.quizData,answered:this.tracker,result_id:this.resultId}});i.done(function(t){"number"==typeof t&&(e.$wrapper.find(".wq-subscribe-form").attr("data-tracking-id",t),e.$wrapper.find(".wq-share button").attr("data-tracking-id",t),n(".mfp-wrap .wq-popup .wq-share button").attr("data-tracking-id",t),e.$wrapper.find(".wq_forceShareFB").attr("data-tracking-id",t))}),i.fail(function(t){console.error(t)})}}]),a}();n(document).ready(function(){n(".wq-quiz-personality").each(function(){var t=n(this).attr("data-quiz-id");void 0!==window["personalityQuiz"+t]&&new e(n(this),window["personalityQuiz"+t])})})}(wpQuiz,jQuery);