$(document).ready(function(){
   $("li.one").on("click",function(){
      $(this).find("ul.show-none").toggle();
      if($(this).find("ul").css("display") == "block"){
         $(this).siblings().find("ul").css("display","none");
      }
   });
   $('.goods_search').click(function () {
      var goods_status = "";
      var goods_ground = "";
      if($(".goods-kind").val() == "is_best"){
         goods_status = "good";
      }
      else if($(".goods-kind").val() == "is_new"){
         goods_status = "new_goods";
      }
      else if($(".goods-kind").val() == "is_hot"){
         goods_status = "sale_hot";
      }
      else if($(".goods-kind").val() == "is_promote"){
         goods_status = "is_promote";
      }
      else if($(".goods-kind").val() == "all_type"){
         goods_status = "all";
      }
      if($(".goods-status").val() == "is_best"){
         goods_ground = "1";
      }
      else if($(".goods-status").val() == "is_new"){
         goods_ground = "0";
      }
      if($(".goods-all option:selected").text() == "所有产品"){
         goods_all = "";
      }
      else {
         goods_all = $(".goods-all option:selected").text();
      }
      goods_category = $(".category").val();
      $.ajax({
         url: "/admin.php/goods/search",
         type: "POST",
         data: {
            "search": $(".keys").val(),
            "status": goods_status,
            "goods_ground":goods_ground,
            "goods_all":goods_all,
            "goods_category":goods_category
         },
         dataType : 'JSON',
         success: function(data) {
            if(data == ""){
               var str = '<tr style="text-align:center;"><td colspan="10" height="45px">没有找到任何数据</td></tr>';
               $(".goodsInfo").empty().html(str);
               $(".page").empty();
            }
            else{
               $(".goodsInfo").html('');

               $.each(data,function(k,v){
                  if(k!="page"){
                     if(v['ground'] == 0){
                        var ground_name = '<img src="../images/no.gif">';
                     }
                     else if(v['ground'] == 1){
                        var ground_name = '<img src="../images/yes.gif">';
                     }
                     if(v['good'] == 0){
                        var good_name = '<img src="../images/no.gif">';
                     }
                     else if(v['good'] == 1){
                        var good_name = '<img src="../images/yes.gif">';
                     }
                     if(v['new_goods'] == 0){
                        var new_goods_name = '<img src="../images/no.gif">';
                     }
                     else if(v['new_goods'] == 1){
                        var new_goods_name = '<img src="../images/yes.gif">';
                     }
                     if(v['sale_hot'] == 0){
                        var sale_hot_name = '<img src="../images/no.gif">';
                     }
                     else if(v['sale_hot'] == 1){
                        var sale_hot_name = '<img src="../images/yes.gif">';
                     }
                     var str = '<tr><td class="goods-id"><input type="checkbox"/>&nbsp;&nbsp;'+v['Id']+
                     '</td><td class="goods-name">'+v['goods_name']+
                     '</td><td class="goods-member">'+v['goods_number']+
                     '</td><td class="goods-price">'+v['goods_price']+
                     '</td><td class="goods-status">'+ground_name+
                     '</td><td class="goods-status">'+good_name+
                     '</td><td class="goods-status">'+new_goods_name+
                     '</td><td class="goods-status">'+sale_hot_name+
                     '</td><td class="goods-num">'+v['goods_num']+
                     '</td><td class="goods-operate"><a href="">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">删除</a></td></tr>';
                     $(".goodsInfo").append(str);
                     $(".page").empty();
                  }
                  else{
                     var allPage = data.page.totalCount/data.page.defaultPageSize;
                     if(parseInt(allPage) == allPage){
                        var page = allPage;
                     }
                     else{
                        var page = parseInt(allPage)+1;
                     }
                     var str = '<ul class="pagination"><li class="first disabled"><a >首页</a></li><li class="prev disabled"><a >上一页</a></li><li><a >'+page+
                     '</a></li><li class="next disabled"><span>下一页</span></li><li class="last disabled"><span>尾页</span></li></ul>';
                    $(".page").append(str);
                    
                  }
                  
               });

            }
         
         },
         error: function() {
            alert('error！');
         }
      });
      return false;
   });
   $(".category").click(function(){
      if($("#modal").css("display") == "none"){
         $("#modal").css("display","block");
      }
      else{
         $("#modal").css("display","none");
      }     
   });

   $(".category_one .oone").each(function(){
      $(this).click(function(){
         $(".category").val($(this).text());
         if($(this).parent().find(".category_two").css("display") == "none"){
            $(this).parent().find(".category_two").css("display","block");
            $(this).parent().siblings().find(".category_two").css("display","none");
            $(this).parent().css("background-position","-93px 1px");
            $(this).parent().siblings().css("background-position","-75px 1px");
         }
         else{
            $(this).parent().find(".category_two").css("display","none");
            $(this).parent().css("background-position","-75px 1px");
         } 
      });                
   });
   $(".category_two .ttwo").each(function(){
      $(this).click(function(){
         $(".category").val($(this).text());
         if($(this).parent().find(".category_three").css("display") == "none"){
            $(this).parent().find(".category_three").css("display","block");
            $(this).parent().siblings().find(".category_three").css("display","none");
            $(this).parent().css("background-position","-93px 1px");
            $(this).parent().siblings().css("background-position","-75px 1px");
         }
         else{
            $(this).parent().find(".category_three").css("display","none");
            $(this).parent().css("background-position","-75px 1px");
         }  
      });                
   });

   $(".category_three").each(function(){
      $(this).click(function(){
         $(".category").val($(this).find("span").text());        
      });                 
   });
   
   $(".goods-color img").click(function(){     
      $(this).parent().find("table").toggle();
   });
   $(".goods-color table tr td").each(function(){
      $(this).click(function(){
         var color = $(this).attr("bgcolor");
         $(this).parents().siblings("img").css("background-color",color);
         $(".goods_name").css("color",color);
         $(".goods-color").find("table").css("display","none");
      });                
   });
   $(".goods-font ").change(function(){ 
      var op_val = $(".goods-font option:selected").val();
      if(op_val == "b"){
         $(".goods_name").css("font-weight","bold");
      }  
      else  if(op_val == "em"){
         $(".goods_name").css("font-style","italic");
      }
      else  if(op_val == "u"){
         $(".goods_name").css("text-decoration","underline ");
      }
      else  if(op_val == "strike"){
         $(".goods_name").css("ext-decoration","line-through");
      }
   });
   //商品分类 -- 添加分类的显示或隐藏
   $(".add-kinds").click(function(){   
      $(this).siblings("input").toggle();
   });
   //商品分类 -- 添加分类
   $(".add-kinds-button").click(function(){  
      if($(".goods_kinds").val() == ""){
         $parent = "";
      }
      else{ $parent = $(".goods_kinds").data("id"); }
      $.ajax({  
         type: "POST",  
         url: "/admin.php/goods/addkinds",  
         data: { "text":$(".add-kinds-text ").val(),
                 "parent":$parent
         },
         success: function(data){
            if(data == 'error'){
               alert("添加分类失败！");
            }
            else{ alert("添加成功！"); }
         }  
                         
     });
     return false;
   });
   //商品分类遍历数据的显示和隐藏
   $(".goods_kinds").click(function(){     
      $(this).siblings("#goods_modal").toggle();
   });
   //扩展分类
   $("#add-extend-kind").click(function(){  
      var a = document.getElementById("goods-extend");    
      var cad = a.cloneNode(true); 
      cad.setAttribute("id", "" );  
      $("#goods-extend").after(cad);
   });
   //商品品牌 -- 添加品牌隐藏和显示
   $(".add-brand").click(function(){   
      $(this).siblings("input").toggle();
   });
   //商品品牌 -- 添加品牌
   $(".add-brand-botton").click(function(){  
      var brand = $(".add-brand-text").val();
      $(".brand-text").val(brand);
   });
   //商品品牌隐藏和显示
   $(".brand-text").click(function(){
      if($(this).val() == "请输入......"){
         $(this).val(''); 
      }
      
      $(".brand").toggle();
   });
   //市场售价取整数
   $("#marketSale-botton").click(function(){
      var marketSale = parseInt($(".marketSale").val());
      $(".marketSale").val(marketSale);
   });
   //促销价是否被操作
   $("input[name='ckbox']").click(function(){
     if($("input[name='ckbox']:checked").val() == undefined){
         $(".is_write").attr("disabled", true);
      }
     else{
         $(".is_write").attr("disabled", false);
     }
   });
   //限购数量是否被操作
   $("input[name='sale-number']").click(function(){
     if($("input[name='sale-number']:checked").val() == undefined){
         $(".sale-number").attr("disabled", true);
      }
     else{
         $(".sale-number").attr("disabled", false);
     }
   });
   //商品分类的选择
   $("#goods_modal span").click(function(){
      $(".goods_kinds").val($(this).text());
      $(".goods_kinds").attr("data-id",$(this).data("id"));
   });
   //市场售价
   $(".add-goods-botton").click(function(){
      var  market = $(".price").val() * 2.3;
      $(".marketSale").val(market.toFixed(1));
   });
   //市场售价取整
   $("#marketSale-botton").click(function(){
      $(".marketSale").val(parseInt($(".marketSale").val()));
   });
});
//上传图片
function uploadImage() {
   //判断是否有选择上传文件
   var imgPath = $("#up_img").val();
   if (imgPath == "") {
      alert("请选择上传图片！");
      return;
   }
   //判断上传文件的后缀名
   var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
   if (strExtension != 'jpg' && strExtension != 'gif'
      && strExtension != 'png' && strExtension != 'bmp') {
      alert("请选择图片文件");
      return;
   };
   var formdata = new FormData();
   var fileObj = $("#up_img").get(0).files;
   formdata.append("file", fileObj[0]);
   formdata.append("aid", 30);
   formdata.append("nickname", "你好");
   //alert(fileObj);
   $.ajax({
      type: "POST",
      url: '/admin.php/goods/upload',
      data: formdata,
      processData: false,
      contentType: false,
      cache: false,
      success: function(data) {
         var data = $.parseJSON(data);
          if(data.status == 1){
         var str = '<div class="z_addImg1"><img src="/Api'+data.url+'"></div>';
         $("#shangchuan").attr("src",'/admin.php'+data.url);
      }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
          alert("上传失败，请检查网络后重试");
          console.log(XMLHttpRequest);
          console.log(textStatus);
          console.log(errorThrown);
      }
   });
}
//上传缩略图
function uploadThumb() {
   //判断是否有选择上传文件
   var imgPath = $("#file").val();
   if (imgPath == "") {
      alert("请选择上传图片！");
      return;
   }
   //判断上传文件的后缀名
   var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
   if (strExtension != 'jpg' && strExtension != 'gif'
      && strExtension != 'png' && strExtension != 'bmp') {
      alert("请选择图片文件");
      return;
   };
   var formdata = new FormData();
   var fileObj = $("#file").get(0).files;
   formdata.append("file", fileObj[0]);
   formdata.append("aid", 30);
   formdata.append("nickname", "你好");
   //alert(fileObj);
   $.ajax({
      type: "POST",
      url: '/admin.php/goods/thumb',
      data: formdata,
      processData: false,
      contentType: false,
      cache: false,
      success: function(data) {
         var data = $.parseJSON(data);
          if(data.status == 1){
         //var str = '<div class="z_addImg1"><img src="/Api'+data.url+'"></div>';
         $("#thumb").attr("src",'/admin.php'+data.url);
      }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
          alert("上传失败，请检查网络后重试");
          console.log(XMLHttpRequest);
          console.log(textStatus);
          console.log(errorThrown);
      }
   });
}
//商品品牌选择
function GaiBian(osel){
   $(".brand-text").val(osel.options[osel.selectedIndex].text);
   $(".brand-text").attr("data-id",osel.options[osel.selectedIndex].value);
   $(".brand").toggle();
}
//删除商品
$(document).on("click",".delete",function(){
   var url = window.location.href;
   var click = confirm("确定删除");
   if(click == true){
      $.ajax({  
         type: "POST",  
         url: "/admin.php/goods/del",  
         data: {"id":$(this).data("id")},
         success: function(data){
            if(data == "error"){
               alert("删除失败！");
               return false;
            }
            else{
               window.location.href = url;
            }
         }  
                      
      });
   }
   return false;
});
function isClick(val) {
   $("#"+val).click(function(){
      var goodsName = $(".goods_name").val();//商品名称
      var goodsNum  = $(".goods_sn").val();//商品货号
      var goodsKinds  = $(".goods_kinds").val();//商品分类
      var goodsExtend  = $("#goods-extend").val();//扩展分类
      var brandText  = $(".brand-text").data("id");//商品品牌
      var price  = $(".price").val();//该商品的本店价格
      var marketSale  = $(".marketSale").val();//该商品的市场价格
      var huiyuan  = $(".huiyuan").val();//该商品的普通会员
      var huiyuan_qq  = $(".huiyuan_qq").val();//该商品的qq会员
      var huiyuan_tp  = $(".huiyuan_tp").val();//该商品的铜牌会员
      var huiyuan_jp  = $(".huiyuan_jp").val();//该商品的金牌会员
      var sale_point = $(".sale_point").val();//该商品赠送积分
      var grade_point = $(".grade_point").val();//该商品等级积分
      var pre_num = $(".pre_num").val();//该商品优惠数量
      var romote_price = $(".is_write").val();//该商品的促销价
      var romote_start = $("#romote_start").val();//该商品的促销起始日期
      var romote_end = $("#romote_end").val();//该商品的促销结束日期
      var limit_num = $(".sale-number").val();//该商品的限购数量
      var limit_start = $("#limit_start").val();//该商品的限购起始日期
      var limit_end = $("#limit_end").val();//该商品的限购结束日期
      var up_img = $("#shangchuan").attr("src");//上传图片
      var thumb = $("#thumb").attr("src");//上传缩略图
      var pre_price = marketSale*pre_num - $(".pre_price").val();//该商品优惠价格
      
      if(sale_point == "-1"){ sale_point = marketSale;} 
      if(grade_point == "-1"){ grade_point = marketSale;} 
      if(goodsName == ""){
         alert("商品名称不能为空！");
         return false;
      }
      else if(goodsKinds == ""){
         alert("请选择商品分类！");
         return false;
      }
      else if(goodsExtend == "" || goodsExtend == "请选择..."){
         alert("请选择商品的扩展分类！");
         return false;
      }
      else if(brandText == "" || brandText == "请输入......"){
         alert("请选择商品品牌！");
         return false;
      }
      else if(price == "" || price == "0"){
         alert("请填写该商品的价格！");
         return false;
      }
      else if(marketSale == "" ){
         alert("请获取该商品的市场价格！");
         return false;
      }
      else if(romote_start　> romote_end){
         alert("促销商品的起始日期不能小于促销商品的结束日期！");
         return false;
      }
      else if(limit_start　> limit_end){
         alert("限购商品的起始日期不能小于限购商品的结束日期！");
         return false;
      }
      else if(up_img == "" ){
         alert("请上传该商品的图片！");
         return false;
      }
      else if(thumb == "" ){
         alert("请上传该商品的缩略图！");
         return false;
      }
      var goodsKind =  $(".goods_kinds").data("id");
      if(val == "add-goods-submit"){
         var url = "/admin.php/goods/add";
         var goods_id = "";
      }
      else if(val == "update-goods-submit"){
         var url = "/admin.php/goods/update";
         var goods_id = window.location.search.split("=")[1];
      }
      $.ajax({  
         type: "POST",  
         url: url,  
         data: {"goodsName":goodsName,
                "goodsNum":goodsNum,
                "goodsKind":goodsKind,
                "goodsExtend":goodsExtend,
                "brandText":brandText,
                "price":price,
                "marketSale":marketSale,
                "sale_point":sale_point,
                "grade_point":grade_point,
                "pre_num":pre_num,
                "pre_price":pre_price,
                "romote_price":romote_price,
                "romote_start":romote_start,
                "romote_end":romote_end,
                "limit_num":limit_num,
                "limit_start":limit_start,
                "limit_end":limit_end,
                "up_img":up_img,
                "thumb":thumb,
                "goods_id":goods_id
         },
         success: function(data){
             if(data == "error"){
               alert("添加商品失败");
             }
             else{
               window.location.href="/admin.php/goods/list";
             }
         }  
                      
        });
        return false;

   });
}


//添加商品
   /*$("#add-goods-submit").click(function(){
      var goodsName = $(".goods_name").val();//商品名称
      var goodsNum  = $(".goods_sn").val();//商品货号
      var goodsKinds  = $(".goods_kinds").val();//商品分类
      var goodsExtend  = $("#goods-extend").val();//扩展分类
      var brandText  = $(".brand-text").data("id");//商品品牌
      var price  = $(".price").val();//该商品的本店价格
      var marketSale  = $(".marketSale").val();//该商品的市场价格
      var huiyuan  = $(".huiyuan").val();//该商品的普通会员
      var huiyuan_qq  = $(".huiyuan_qq").val();//该商品的qq会员
      var huiyuan_tp  = $(".huiyuan_tp").val();//该商品的铜牌会员
      var huiyuan_jp  = $(".huiyuan_jp").val();//该商品的金牌会员
      var sale_point = $(".sale_point").val();//该商品赠送积分
      var grade_point = $(".grade_point").val();//该商品等级积分
      var pre_num = $(".pre_num").val();//该商品优惠数量
      var romote_price = $(".is_write").val();//该商品的促销价
      var romote_start = $("#romote_start").val();//该商品的促销起始日期
      var romote_end = $("#romote_end").val();//该商品的促销结束日期
      var limit_num = $(".sale-number").val();//该商品的限购数量
      var limit_start = $("#limit_start").val();//该商品的限购起始日期
      var limit_end = $("#limit_end").val();//该商品的限购结束日期
      var up_img = $("#shangchuan").attr("src");//上传图片
      var thumb = $("#thumb").attr("src");//上传缩略图
      var pre_price = marketSale*pre_num - $(".pre_price").val();//该商品优惠价格
      if(sale_point == "-1"){ sale_point = marketSale;} 
      if(grade_point == "-1"){ grade_point = marketSale;} 
      if(goodsName == ""){
         alert("商品名称不能为空！");
         return false;
      }
      else if(goodsKinds == ""){
         alert("请选择商品分类！");
         return false;
      }
      else if(goodsExtend == "" || goodsExtend == "请选择..."){
         alert("请选择商品的扩展分类！");
         return false;
      }
      else if(brandText == "" || brandText == "请输入......"){
         alert("请选择商品品牌！");
         return false;
      }
      else if(price == "" || brandText == "0"){
         alert("请填写该商品的价格！");
         return false;
      }
      else if(marketSale == "" ){
         alert("请获取该商品的市场价格！");
         return false;
      }
      else if(up_img == "" ){
         alert("请上传该商品的图片！");
         return false;
      }
      else if(thumb == "" ){
         alert("请上传该商品的缩略图！");
         return false;
      }
      var goodsKind =  $(".goods_kinds").data("id");
      $.ajax({  
         type: "POST",  
         url: "/admin.php/goods/add",  
         data: {"goodsName":goodsName,
                "goodsNum":goodsNum,
                "goodsKind":goodsKind,
                "goodsExtend":goodsExtend,
                "brandText":brandText,
                "price":price,
                "marketSale":marketSale,
                "sale_point":sale_point,
                "grade_point":grade_point,
                "pre_num":pre_num,
                "pre_price":pre_price,
                "romote_price":romote_price,
                "romote_start":romote_start,
                "romote_end":romote_end,
                "limit_num":limit_num,
                "limit_start":limit_start,
                "limit_end":limit_end,
                "up_img":up_img,
                "thumb":thumb
         },
         success: function(data){
             if(data == "error"){
               alert("添加商品失败");
             }
             else{
               window.location.href="/admin.php/goods/list";
             }
         }  
                      
        });
        return false;

   });*/