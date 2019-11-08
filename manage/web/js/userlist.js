// //为添加按钮绑定点击事件
// $('.add-btn').click(function(){
//     //显示遮罩层和弹框
//     $('.mask').fadeIn();
//     $('.modal').fadeIn();
//     $('.up-imglist').fadeOut();
//     flag = 0; //当前是添加操作
// });
// //为取消按钮绑定点击事件
// $('.exit').click(function () {
//     $('.mask').fadeOut();
//     $('.modal').fadeOut();
//
//     $('.modal input').val('');
//     $('.up-res').attr('src','');
//     $('.up-imglist').children().remove();
// });
// //为弹框的确定按钮绑定点击事件
// $('.sure').click(function(){
//     //获取信息
//     const type1 = $('.g-type1').val();
//     const type2 = $('.g-type2').val();
//     const goodname = $('.g-goodname').val();
//     const size = $('.g-size').val();
//     const price = $('.g-price').val();
//     const number =$('.g-number').val();
//     const count = $('.g-count').val();
//     const img = $('.up-res').attr('src');
//     const imgs = $('.up-imglist').children().children('.img-list-bs');
//
//     let imgArr =[];
//     for(let i=0; i< imgs.length;i++){
//         imgArr.push(imgs[i].src);
//     }
//     let imglist = imgArr.join('|');
//     const detail =$('.g-detail').val();
//
//     flag ? up(type1,type2,goodname,size,price,number,count,img,imglist,detail) : insert(type1,type2,goodname,size,price,number,count,img,imglist,detail);
//
// });
//
// function insert(type1,type2,goodname,size,price,number,count,img,imglist,detail) {
//
//
//     //如果输入的数据都符合规则，就将数据添加到数据库
//     if(type1 && type2 &&goodname && size && price && number && count && img && imglist && detail){
//         if ( value == '男装'){
//             a = 0;
//         }
//         let a;
//         //点击确定事件 添加的ajax的请求
//         $.ajax({
//             type:'post',
//             url:'../controller/DetailsDao.php',
//             data:{
//                 type: 'insert',
//                 Type1:a,
//                 Type2:b,
//                 type1,type2,goodname,size,price,number,count,img,imglist,detail
//             },
//             success(res) {
//                 //   解析res
//                 console.log(res);
//                 const obj = JSON.parse(res);
//                 if(obj.code){
//                     alert('添加成功');
//                     $('.mask').fadeOut();
//                     $('.modal').fadeOut();
//                     //如果用户添加成功，需要在页面及时显示用户添加的新的内容，根据获取到的表单内容，创建一个tr，添加到表格中
//                     const tr = $(`
//                         <tr>
//                             <td>${type1}</td>
//                             <td>${type2}</td>
//                             <td>${goodname}</td>
//                             <td>${size}</td>
//                             <td>${price}</td>
//                             <td>${number}</td>
//                             <td>${count}</td>
//                             <td>
//                                 <img src="${img}" alt="">
//                             </td>
//                             <td class="i-list"></td>
//                             <td>${detail}</td>
//                             <td>
//                                 <div class="view" onclick="update(this)" data-id="${obj.id}">修改</div>
//                                 <div class="delete" onclick = "del(this)" data-id="${obj.id}">删除</div>
//                             </td>
//                         </tr>`);
//                     //创建详情列表
//                     imglist = imglist.split('|');
//                     for(let img of imglist){
//                         let ni = $(`<img src="${img}">`);
//                         tr.children('.i-list').append(ni);
//                         console.log(imglist);
//                     }
//                     $('.tab').append(tr);
//
//                     //添加成功之后，清空输入框中的所有内容
//                     $('.modal input').val('');
//                     $('.up-res').attr('src','');
//                     $('.up-imglist').children().remove();
//
//                 }else{
//                     alert('添加失败');
//                 }
//             },
//             error(){
//                 console.log('请求失败') ;
//             }
//         });
//     }
// }
//
//
// //查找数据
// function select(){
//     $.ajax({
//         type:'post',
//         url:'../controller/ProductDao.php',
//         data:{
//             type:'select'
//         },
//         success(res){
//             const arr = JSON.parse(res);
//             for(let item of arr){
//                 let el = $(`
//                         <tr>
//                             <td>${item.type1}</td>
//                             <td>${item.type2}</td>
//                             <td>${item.goodname}</td>
//                             <td>${item.size}</td>
//                             <td>${item.price}</td>
//                             <td>${item.number}</td>
//                             <td>${item.count}</td>
//                             <td>
//                                 <img src="${item.img}" alt="">
//                             </td>
//                             <td class="i-list"></td>
//                             <td>${item.detail}</td>
//                             <td>
//                                  <div class="view" data-id="${item.ID}" onclick="update(this)">修改</div>
//                                  <div class="delete" data-id="${item.ID}" onclick="del(this)">删除</div>
//                             </td>
//                         </tr>`);
//                 //循环创建详情图列表
//                 let imglist = item.imglist.split('|');
//                 for(let img of imglist){
//                     let ni = $(`<img src="${img}">`);
//                     //将详情图添加到当前行的详情图列表中
//                     el.children('.i-list').append(ni);
//                 }
//                 $('.tab').append(el);
//             }
//         }
//     });
// }
// select();