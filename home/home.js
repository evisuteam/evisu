// 定义一个类

// 类中增加一个方法

// body中定义个节点

// 脚本中吧节点和类定义结合起来，实现特定的组件功能


//全局变量 let
let EndArr=[];

//全局变量const
let sdbEndBottom10=document.getElementsByClassName('sdbEndBottom10')[0];
let classsdbEndBottomOne=document.getElementsByClassName('sdbEndBottomOne')[0];




// head();

//循环创建十个小窗口
for(let i=0;i<10;i++){
    
    //创建元素
    let el=`<li class="sdbEndBottomOne">
    <a href="">
        <div class="sdbEndPhoto">
            <img src="../imgs/${i>=9?'':'0'}${i+1}.jpg" alt="">
        </div>
        <div>
            <div class="sdbEndName">EVISU 19AW 男士标志印花羽绒服外套 1EAADM9NJ703XX</div>
            <div class="sdbEndPrice">￥ 3,299.00</div>
        </div>
    </a>
</li>`;
    $('.sdbEndBottom10').append(el);

}



// sdbEndBottom10.innerHTML += ell;




