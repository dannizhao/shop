(function(){
		function createAnimate(cns){
			var cns = typeof cns ==="string"? document.getElementById(cns) : cns;
			var ctx = cns.getContext("2d");
			var w   = document.documentElement ? document.documentElement.clientWidth : document.body.clientWidth;
			var h   = document.documentElement ? document.documentElement.clientHeight : document.body.clientHeight;
			cns.width  = w;
			cns.height = h;
			ctx.width  = w;
			ctx.height = h;

			var getRandColor = function(){ 
				var str   ="0123456789abcdef";
				var color ="";
				for(;color.length < 6;){
					color += str.charAt(Math.floor(Math.random() * str.length));
				}
				return"#"+ color;
			};

			var createBall = function(ctx, x, y, r, sc){
				var x = x ? x : 10,
				y = y ? y : 10,
				r = r ? r : 8,
				sc = sc ? sc :"#e20000",
				pi = Math.PI;
				ctx.save();
				ctx.strokeStyle = sc;
				ctx.beginPath();
				ctx.moveTo(x - r * Math.cos(0.133 * pi), y + r * Math.sin(0.133 * pi));
				ctx.arc(x, y, r*3, 0, 2 * pi, 0);
				ctx.lineTo(x, y + r * 2.8);
				ctx.closePath();

				ctx.shadowColor = sc;
				ctx.fillStyle="#f5f5f5";
				ctx.shadowOffsetX = 0;
				ctx.shadowOffsetY = 0.2 * r;
				ctx.shadowBlur = r;
				ctx.fill();
				ctx.restore();
			};

			var cs = [], rs = [], xs = [], ys = [];
			cs.push(getRandColor());
			rs.push(Math.floor(Math.random() * 10) + 10);
			xs.push(Math.random() * (w - 100) + 50);
			ys.push(h + Math.random() * 50);
			setInterval(function(){
				cs.push(getRandColor());
				rs.push(Math.floor(Math.random() * 10) + 10);
				xs.push(Math.random() * (w - 100) + 50);
				ys.push(h + Math.random() * 50);
			}, 1000);

			setInterval(function(){
				ctx.clearRect(0, 0, w, h);
				for(var i = 0; i < xs.length; i++){
					if(xs[i] < -20 || ys[i] < -80 || xs[i] > w + 20){
						xs.shift();
						ys.shift();
						rs.shift();
						cs.shift();
					}
				}
				ctx.fillStyle ="#fff";
				ctx.font ="16px 微软雅黑";
				for(var i = 0; i < cs.length; i++){
					createBall(ctx, xs[i] += Math.random() * 10 - 5, ys[i] -= Math.random() * 5, rs[i], cs[i]);
				}

			}, 1000/60);
		}
		createAnimate("canvas");
	})();

	var canvas = document.getElementById('order-chart');
        canvas.width = 1240;
        canvas.height = 280;
        if(canvas.getContext){
            var ctx = canvas.getContext("2d"),
                width = canvas.width,
                height = canvas.height;
            ctx.lineWidth = 2;
　　　　　　　//先画横线
            for( var i = 0; i * 53 <= height; i++ ){
                ctx.strokeStyle = '#DCDCDC';
                ctx.beginPath();
                ctx.moveTo(40,i * 53);
                ctx.lineTo(width,i* 53);
                ctx.stroke();
            }
　　　　　　　//再画纵线
            for( var j = 1; j * 40 <= width; j++ ){
                ctx.strokeStyle = '#DCDCDC';
                ctx.beginPath();
                ctx.moveTo(j * 40, 0);
                ctx.lineTo(j * 40, height-15);
                ctx.stroke();
                var textX=['5个','4个','3个','2个','1个','0个'];
                for (var i = 0; i <= 5; i++) {
                	ctx.fillText(textX[i],0,i*53+8);
                }
                for (var k = 1; k < 32; k++) {
                	ctx.fillText(k,k*40+20,280);
                }               
            }
        }

        var canvas1 = document.getElementById('sale-chart');
        canvas1.width = 1240;
        canvas1.height = 280;
        if(canvas1.getContext){
            var context = canvas1.getContext("2d"),
                width = canvas1.width,
                height = canvas1.height;
            context.lineWidth = 2;
　　　　　　　//先画横线
            for( var i = 0; i * 53 <= height; i++ ){
                context.strokeStyle = '#DCDCDC';
                context.beginPath();
                context.moveTo(40,i * 53);
                context.lineTo(width,i* 53);
                context.stroke();
            }
　　　　　　　//再画纵线
            for( var j = 1; j * 40 <= width; j++ ){
                context.strokeStyle = '#DCDCDC';
                context.beginPath();
                context.moveTo(j * 40, 0);
                context.lineTo(j * 40, height-15);
                context.stroke();
                var textX=['5元','4元','3元','2元','1元','0元'];
                for (var i = 0; i <= 5; i++) {
                	context.fillText(textX[i],0,i*53+8);
                }
                for (var k = 1; k < 32; k++) {
                	context.fillText(k,k*40+20,280);
                }               
            }
        }