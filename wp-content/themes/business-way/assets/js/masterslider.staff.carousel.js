/**
 *	Master Slider, Staff Carousel v1.0
 * 	@author: Averta Ltd.
 */
(function() {
    window.MSStfFadeView = function(n) {
        MSWaveView.call(this, n), this.$element.removeClass("ms-wave-view").addClass("ms-stf-view"), this._3dreq = !0
    }, MSStfFadeView.extend(MSWaveView);
    var n = MSStfFadeView.prototype,
        t = MSStfFadeView.prototype;
    n.__updateSlidesHoriz = function(n, t) {
        var i = Math.abs(t * .6 / this.__width);
        i = 1 - Math.min(i, .6), n.$element.css("opacity", i)
    }, n.__updateSlidesVertic = function(n, t) {
        this.__updateSlidesHoriz(n, t)
    }, MSSlideController.registerView("stffade", MSStfFadeView)
})(),
function() {
    window.MSStfView = function(n) {
        MSWaveView.call(this, n), this.$element.removeClass("ms-wave-view").addClass("ms-stf-view"), this._3dreq = !0, this.options.centerSpace = this.options.centerSpace || 1
    }, MSStfView.extend(MSWaveView), MSStfView._3dreq = !0, MSStfView._fallback = MSStfFadeView;
    var n = MSStfView.prototype,
        t = MSStfView.prototype;
    n.__calcview = function(n, t) {
        var i = t / 2 * n / (n + 2e3);
        return i * (n + 2e3) / 2e3
    }, n.__updateSlidesHoriz = function(n, t) {
        var i = Math.abs(t * 100 / this.__width);
        i = -Math.min(i, 100) * 15, n.$element.css(window._csspfx + "transform", "translateZ(" + i + "px) rotateY(0.01deg) translateX(" + (t < 0 ? 1 : -1) * -this.__calcview(i, this.__width) * this.options.centerSpace + "px)")
    }, n.__updateSlidesVertic = function(n, t) {
        this.__updateSlidesHoriz(n, t)
    }, MSSlideController.registerView("stf", MSStfView)
}()