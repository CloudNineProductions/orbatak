/*!CK:564806817!*//*1418015128,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["6Co4n"]); }

__d("legacy:bakers-growth-js",["BakerAction"],function(a,b,c,d){a.BakerAction=b('BakerAction');},3);
__d("TimelineSecondaryColumnUnitList",["CSS","DOM","Event","Run","csx","cx","mixInEventEmitter"],function(a,b,c,d,e,f,g,h,i,j,k,l,m){var n=30;function o(p,q){"use strict";var r=i.listen(q,'click',function(){this.$TimelineSecondaryColumnUnitList0=h.scry(p,"._16f_");this.$TimelineSecondaryColumnUnitList1();h.remove(q);this.emit('expanded');}.bind(this));j.onLeave(r.remove.bind(r));}o.prototype.$TimelineSecondaryColumnUnitList1=function(){"use strict";if(!this.$TimelineSecondaryColumnUnitList0.length)return;g.removeClass(this.$TimelineSecondaryColumnUnitList0.shift(),"_16f_");setTimeout(this.$TimelineSecondaryColumnUnitList1.bind(this),n);};m(o,{expanded:true});e.exports=o;},null);