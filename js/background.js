var Background = /** @class */ (function () {
    function Background() {
        this.oldTop = 0;
        this.oldHig = 0;
        this.oldYpos = 0;
        this.init();
    }
    Background.prototype.init = function () {
        var _this = this;
        var wid = jQuery(window).innerWidth();
        var hig = jQuery(window).innerHeight();
        this.app = new PIXI.Application(wid, hig, { backgroundColor: 0xffffff });
        document.getElementById('bg_can').appendChild(this.app.view);
        this.graphicsAry = [];
        for (var i = 0; i < 50; i++) {
            var g = new PIXI.Graphics();
            var px = -75 + 50 * Math.random();
            var py = -75 + 50 * Math.random();
            var rnd = Math.random();
            if (rnd < 0.5) {
                this.drawSmallTriangle(g, 0xe3f4ff);
            }
            else if (rnd < 0.75) {
                this.drawWideTriangle(g, 0xe3f4ff);
            }
            else {
                this.drawLargeTriangle(g, 0xe3f4ff);
            }
            g.position.x = wid * Math.random();
            g.position.y = hig * Math.random();
            g.rotation = Math.random() * (2 * Math.PI);
            this.app.stage.addChild(g);
            //
            var obj = {};
            obj.shape = g;
            obj.speed = 0.01 - Math.random() * 0.1;
            obj.rotate = 0.0025 - Math.random() * 0.005;
            obj.rotateDir = (Math.random() >= 0.5) ? 1 : -1;
            obj.accel = 2.5 - 5 * Math.random();
            this.graphicsAry.push(obj);
        }
        this.app.ticker.add(function (delta) { _this.tickHandler(delta); });
        jQuery(window).on('resize.background', function () { _this.resize(); });
        jQuery(window).on('scroll.background', function (event) { _this.scroll(event); });
    };
    Background.prototype.drawSmallTriangle = function (g, color) {
        var px = -25 + 10 * Math.random();
        var py = -25 + 10 * Math.random();
        g.beginFill(color);
        g.moveTo(px, py);
        g.lineTo(25 - 10 * Math.random(), 25 - 10 * Math.random());
        g.lineTo(0 - 10 * Math.random(), 25 - 10 * Math.random());
        g.lineTo(px, py);
        g.endFill();
    };
    ;
    Background.prototype.drawWideTriangle = function (g, color) {
        var px = -50 + 25 * Math.random();
        var py = -25 + 10 * Math.random();
        g.beginFill(color);
        g.moveTo(px, py);
        g.lineTo(50 - 25 * Math.random(), 25 - 10 * Math.random());
        g.lineTo(0 - 10 * Math.random(), 25 - 10 * Math.random());
        g.lineTo(px, py);
        g.endFill();
    };
    ;
    Background.prototype.drawLargeTriangle = function (g, color) {
        var px = -50 + 25 * Math.random();
        var py = -25 + 10 * Math.random();
        g.beginFill(0xe3f4ff);
        g.moveTo(px, py);
        g.lineTo(50 - 25 * Math.random(), 50 - 25 * Math.random());
        g.lineTo(10 - 20 * Math.random(), 100 - 50 * Math.random());
        g.lineTo(px, py);
        g.endFill();
    };
    ;
    Background.prototype.tickHandler = function (delta) {
        var topP = jQuery(window).scrollTop();
        var hig = jQuery(window).innerHeight();
        for (var i = 0; i < this.graphicsAry.length; i++) {
            //variables
            var g = this.graphicsAry[i].shape;
            var speed = this.graphicsAry[i].speed;
            var accel = this.graphicsAry[i].accel;
            var rotate = this.graphicsAry[i].rotate;
            var rotDir = this.graphicsAry[i].rotateDir;
            g.position.y -= accel;
            if (g.position.y < -100) {
                g.position.y += hig + 150;
            }
            else if (g.position.y >= hig + 100) {
                g.position.y -= hig + 150;
            }
            g.rotation += ((rotate + (accel * 0.01)) * delta) * rotDir;
            //friction
            accel *= 0.995;
            accel = (Math.abs(accel) < 0.005) ? 0 : accel;
            this.graphicsAry[i].accel = accel;
        }
        this.oldTop = topP;
    };
    Background.prototype.scroll = function (event) {
        var yPos = jQuery(window).scrollTop();
        var hig = jQuery(window).innerHeight();
        for (var i = 0; i < this.graphicsAry.length; i++) {
            var accel = this.graphicsAry[i].accel;
            if (yPos - this.oldYpos > 0) {
                accel += 0.05;
            }
            else {
                accel -= 0.05;
            }
            this.graphicsAry[i].accel = accel;
        }
        if (this.oldHig != hig) {
            this.resize();
            this.oldHig = hig;
        }
        this.oldYpos = yPos;
    };
    Background.prototype.resize = function () {
        var wid = jQuery(window).innerWidth();
        var hig = jQuery(window).innerHeight();
        this.app.view.width = wid;
        this.app.view.height = hig;
    };
    return Background;
}());