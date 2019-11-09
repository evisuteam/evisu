// import upFn from './upload.js';
let flag; //用来标记是修改还是添加，1代表修改，0代表添加
let upId; //要修改的数据的 id 值
let trc;
// let upFn;
let btns = $('.btn');
let cards = $('.card');
let prevBtnIndex = 0;
function menuChange(){
    for(var i = 0; i < btns.length; i++){
        btns[i].onclick = function(){
            // 获取当前按钮在btns列表中的下标
            var index = this.getAttribute('data-i');
            // 让上一个被选中的按钮恢复默认样式
            // btns[prevBtnIndex].className = 'btn';
            // 改变当前的按钮样式
            // btns[index].className = 'btn active-btn';
            // 根据下标找到与按钮对应的 card
            // 让上一个 card 隐藏，让当前 card 显示
            var prevClass = cards[prevBtnIndex].className.slice(0, -12);
            // console.log(prevClass);
            cards[prevBtnIndex].className = prevClass;
            cards[index].className += ' active-card';
            prevBtnIndex = index;
        };
    }
}
menuChange();

//为添加按钮绑定点击事件
$('.add-btn').click(function(){
    //显示遮罩层和弹框
    $('.mask').fadeIn();
    $('.modal').fadeIn();
    $('.up-imglist').fadeOut();
    flag = 0; //当前是添加操作
});
//为取消按钮绑定点击事件
$('.exit').click(function () {
    $('.mask').fadeOut();
    $('.modal').fadeOut();

    $('.modal input').val('');
    $('.up-res').attr('src','');
    $('.up-imglist').children().remove();
});
//为弹框的确定按钮绑定点击事件
$('.sure').click(function(){
    //获取信息
    const type1 = $('.g-type1').val();
    const type2 = $('.g-type2').val();
    const goodname = $('.g-goodname').val();
    const size = $('.g-size').val();
    const price = $('.g-price').val();
    const number =$('.g-number').val();
    const count = $('.g-count').val();
    const img = $('.up-res').attr('src');
    const imgs = $('.up-imglist').children().children('.img-list-bs');

    let imgArr =[];
    for(let i=0; i< imgs.length;i++){
          imgArr.push(imgs[i].src);
    }
    let imglist = imgArr.join('|');
    const detail = $('.g-detail').val();

    flag ? up(type1,type2,goodname,size,price,number,count,img,imglist,detail) : insert(type1,type2,goodname,size,price,number,count,img,imglist,detail);

});

function insert(type1,type2,goodname,size,price,number,count,img,imglist,detail) {
    // console.log(type1,type2,goodname,size,price,number,count,img,imglist,detail);
    //如果输入的数据都符合规则，就将数据添加到数据库
    if(type1 && type2 && goodname && size && price && number && count && img && imglist && detail){
        // if ( value == '男装'){
        //     a = 0;
        // }
        // let a;
        //点击确定事件 添加的ajax的请求
        $.ajax({
            type:'post',
            url:'../controller/ProductDao.php',
            data:{
               type: 'insert',
                type1,type2,goodname,size,price,number,count,img,imglist,detail
            },
            success(res) {
             //   解析res
                 const obj = JSON.parse(res);
                 // console.log(obj);
                    if(obj.code){
                        alert('添加成功');
                        $('.mask').fadeOut();
                        $('.modal').fadeOut();
                        //如果用户添加成功，需要在页面及时显示用户添加的新的内容，根据获取到的表单内容，创建一个tr，添加到表格中
                        const tr = $(`
                        <tr>
                            <td>${type1}</td>
                            <td>${type2}</td>
                            <td>${goodname}</td>
                            <td>${size}</td>
                            <td>${price}</td>
                            <td>${number}</td>
                            <td>${count}</td>
                            <td>
                                <img src="${img}" alt="">
                            </td>
<<<<<<< HEAD
                            <td class="i">
                                <div class="i-list"></div>
=======
                            <td class="i-list">
                                <!--<div class="i-list"></div>-->
>>>>>>> 97756ac0169b1411a486292497c57796e9f3a2c8
                            </td>
                            
                            <td>${detail}</td>
                            <td>
                                <div class="view" onclick="update(this)" data-id="${obj.id}">修改</div>
                                <div class="delete" onclick = "del(this)" data-id="${obj.id}">删除</div>
                            </td>
                        </tr>`);
                        //创建详情列表
                        imglist = imglist.split('|');
                        for(let img of imglist){
                            let ni = $(`<img src="${img}">`);
                            tr.children('.i').children('.i-list').append(ni);
                            console.log(imglist);
                        }
                        $('.tab').append(tr);

                        //添加成功之后，清空输入框中的所有内容
                        $(".select").attr("lang",'0');
                        $('.modal input').val('');
                        $('.up-res').attr('src','');
                        $('.up-imglist').children().remove();

                    }else{
                        alert('添加失败');
                    }
            },
            error(){
                console.log('请求失败') ;
            }
        });
    }
}

//修改按钮的点击事件
function update(btn) {
    $('.modal').fadeIn();
    $('.mask').fadeIn();
    $('.up-imglist').fadeIn();
    flag = 1;//当前是修改
    //接受要修改的数据的id
    upId= $(btn).attr('data-id');
    //将要修改的这条信息的数据展示在弹框上
    trc = $(btn).parent().parent().children();
    upIndex = $(btn).parent().parent().index();
    $('.g-type1').val(trc.eq(0).text());
    $('.g-type2').val(trc.eq(1).text());
    $('.g-goodname').val(trc.eq(2).text());
    $('.g-size').val(trc.eq(3).text());
    $('.g-price').val(trc.eq(4).text());
    $('.g-number').val(trc.eq(5).text());
    $('.g-count').val(trc.eq(6).text());
    $('.up-res').attr('src',trc.eq(7).children("img").attr('src'));
    console.log($('.up-img'));
    //获取商品详图路径列表
    let imglist = [];
    const list = trc.eq(8).children();

    for(let i = 0; i < list.length; i++){
        imglist.push(list[i].src);
    }

    for(let item of imglist){
        let li = `
            <div class="imgs-src">
                <img src="${item}" class="img-list-bs">
                <button class="imgs-btn" onclick="delimgs(this)">X</button>
                </div>
        `;
        $('.up-imglist').append(li);
    }
    $('.g-detail').val(trc.eq(9).text());
}

//修改数据
function up(type1,type2,goodname,size,price,number,count,img,imglist,detail) {
    $.ajax({
        type:'post',

        url:'../controller/ProductDao.php',

        data:{
            type:'update',
            id:upId,
            type1,type2,goodname,size,price,number,count,img,imglist,detail
        },
        success(res) {
            console.log(res);
            const obj = JSON.parse(res);
            if(obj.code){
                alert('修改成功');
                $('.mask').fadeOut();
                $('.modal').fadeOut();
                $('.modal input').val('');
                trc.eq(0).text(type1);
                trc.eq(1).text(type2);
                trc.eq(2).text(goodname);
                trc.eq(3).text(size);
                trc.eq(4).text(price);
                trc.eq(5).text(number);
                trc.eq(6).text(count);
                trc.eq(7).children("img").attr('src',gimg);
                trc.eq(8).text(detail);
            }else {
                alert('修改失败');
            }
        }
    })
}

//查找数据
function select(){
    $.ajax({
        type:'post',
        url:'../controller/ProductDao.php',
        data:{
            type:'select'
        },
        success(res){
            const arr = JSON.parse(res);
            for(let item of arr){
                let el = $(`
                        <tr>
                            <td>${item.type1}</td>
                            <td>${item.type2}</td>
                            <td>${item.goodname}</td>
                            <td>${item.size}</td>
                            <td>${item.price}</td>
                            <td>${item.number}</td>
                            <td>${item.count}</td>
                            <td>
                                <img src="${item.img}" alt="">
                            </td>
                            <td class="i-list"></td>
                            <td>${item.detail}</td>
                            <td>
                                 <div class="view" data-id="${item.ID}" onclick="update(this)">修改</div>
                                 <div class="delete" data-id="${item.ID}" onclick="del(this)">删除</div>  
                            </td>
                        </tr>`);
                //循环创建详情图列表
                let imglist = item.imglist.split('|');
                for(let img of imglist){
                    let ni = $(`<img src="${img}">`);
                    //将详情图添加到当前行的详情图列表中
                    el.children('.i-list').append(ni);
                }
                $('.tab').append(el);
            }
        }
    });
}
select();

//删除
function del(btn){
    //btn:当前点击的删除按钮本身
    //确定要删除的这条信息的ID
    const id = $(btn).attr('data-id');
    //发送ajax请求删除数据
    $.ajax({
        type:'post',
        url:'../controller/ProductDao.php',
        data:{
            type:'delete',
            id
        },
        //接收返回值，如果删除成功，将对应的tr从页面上移除
        success(res){
            console.log(res);
            const obj = JSON.parse(res);
            if(obj.code){
                alert('删除成功');
                //删除成功之后还要将删除的这一行数据从表格中移出
                $(btn).parent().parent().remove();
            }else{
                alert('删除失败');
            }
        }
    })
}

//添加商品时上传按钮点击事件
$('.up-img-btn').click(function(){
    //获取要上传的文件的信息并做验证
    const filedata = $('.up-img')[0].files[0];
    upFn(filedata,function(res){
        //将弹框中的img路径设置为上传成功之后的路径
        console.log(res);
        $('.up-res').attr('src',res);
        //点击弹框的确定按钮时，当前图片的路径要存储到数据库中
    })
});

//商品图片列表的事件
$('.up-img-btn2').click(function () {
    const Filedata = $('.g-imglist')[0].files[0];
    console.log(Filedata);
    upFn(Filedata,function (res) {
        console.log(res);
        //将弹框中img的路径设置为上传成功之后的路径
        let tr = $(`
                <div class="imgs-src">
                <img src="${res}" class="img-list-bs">
                <button class="imgs-btn" onclick="delimgs(this)">X</button>
                </div>
            `);
        $('.up-imglist').append(tr);
        console.log(tr);
        //向元素内动态创建img
        $('.up-imglist').fadeIn();
    })
});
function delimgs(btn) {
    const  res = $(btn).parent().remove();
    console.log(res);
}


/**JQ实现二级菜单联动**/
var $major = $("#major");

$("#college").change(function(){
    var $college_name =  $("#college").val();
    if("男装" == $college_name) {
        $major.find("option").remove();
        $major.append("<option>请选择");
        $major.append("<option>T恤");
        $major.append("<option>卫衣");
        $major.append("<option>运动裤");
        $major.append("<option>夹克");
        $major.append("<option>牛仔裤");
        $major.append("<option>短裤");
        $major.append("<option>内裤");
        $major.append("<option>羽绒服");
    }else if("女装" == $college_name) {
        $major.find("option").remove();
        $major.append("<option>请选择");
        $major.append("<option>T恤");
        $major.append("<option>卫衣");
        $major.append("<option>运动裤");
        $major.append("<option>夹克");
        $major.append("<option>牛仔裤");
        $major.append("<option>短裤");
        $major.append("<option>连衣裙");
        $major.append("<option>休闲裤");
        $major.append("<option>外套");
        $major.append("<option>短裙");
        $major.append("<option>羽绒服");
    }else if("童装" == $college_name) {
        $major.find("option").remove();
        $major.append("<option>请选择");
        $major.append("<option>T恤");
        $major.append("<option>卫衣");
        $major.append("<option>夹克");
        $major.append("<option>牛仔裤");
    }
});



$('.btn1').each(function(){
    $(this).click(function(){
        const _type2 = $(this).attr('data-i');
        $.ajax({
            type:'post',
            url:'../../controller/ProductDao.php',
            data:{
                type:'typelist',
                // $college_name,
                _type2
            },
            success(res){
                $('.smallcard tbody').html('');
                const arr1= JSON.parse(res);
                console.log(arr1);
                for(let item of arr1){
                    let el = $(`
                            <tr>
                                <td>${item.name}</td>
                                <td>${item.capacity}</td>
                                <td>${item.price}</td>
                                <td>${item.intro}</td>
                                <td>${item.count}</td>
                                <td>
                                    <img src="${item.img}" alt="">
                                </td>
                                <td class="td-longimg">
                                    <div class="td-div">
                                        <img src="${item.imglist}" alt="">
                                    </div>
                                </td>
                                <td>${item.attrlist}</td>
                                <td>
                                    <button type="button"
                                        class="layui-btn layui-btn-normal layui-btn-sm view" data-id="${item.ID}" onclick="update(this)">修改<tton>
                                    <button type="button"
                                        class="layui-btn layui-btn-warm layui-btn-sm delete" data-id="${item.ID}" onclick="del(this)">删除<tton>
                                </td>
                            </tr>
                    `);
                    $('.smallcard').append(el);
                }
            }
        })
    })
});
