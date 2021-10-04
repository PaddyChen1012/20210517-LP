function getStyle(ele,attr){
    if(window.getComputedStyle){
        return window.getComputedStyle(ele,null)[attr];
    }
    return ele.currentStyle[attr];
}

// 第一个参数是调用的元素，第二参数是css属性和值，对象，第三个参数是回调函数
function animate(ele,cssObj,fn){
    //先清定时器
    clearInterval(ele.timer);
    ele.timer = setInterval(function () {
        //开闭原则
        var bool = true;
        for(var k in cssObj){
            var leader;
            //判断如果属性为opacity的时候特殊获取值
            if(k === "opacity"){
                leader = getStyle(ele,k)*100 || 1;
            }else{
                leader = parseInt(getStyle(ele,k)) || 0;
            }
            //1.获取步长
            var step = (cssObj[k] - leader)/10;
            //2.二次加工步长
            step = step>0?Math.ceil(step):Math.floor(step);
            leader = leader + step;
            //3.赋值
            if(k === "opacity"){
                ele.style[k] = cssObj[k];
                //兼容IE678
                ele.style.filter = "alpha(opacity="+cssObj[k]+")";
            }else if(k === "zIndex"){
                ele.style.zIndex = cssObj[k];
            }else if(k === "top"){
                ele.style.top = cssObj[k] + "%";
            }else{
                ele.style[k] = cssObj[k] + "%";
            }
            //4.清除定时器
            if(cssObj[k] !== leader){
                bool = false;
            }
        }
        if(bool){
            clearInterval(ele.timer);
            //只有传递了回调函数，才能执行
            fn && fn()
        }
    },25);
}

// 1.给每个图片设置相应的位置，透明度，层级
var spinArr = [
    {  
        width:60,
        top:20,
        left:-30,
        opacity:.1,
        zIndex:2
    },
    {  
        width:80,
        top:10,
        left:0,
        opacity:.2,
        zIndex:3
    },
    {   
        width:100,
        top:0,
        left:50,
        opacity:1,
        zIndex:4
    },
    {  
        width:80,
        top:10,
        left:100,
        opacity:.2,
        zIndex:3
    },
    {   
        width:60,
        top:20,
        left:130,
        opacity:.1,
        zIndex:2
    }
]
// 2.获取相应的元素
var slide = document.querySelector(".slide") //最外层容器
var ul = document.querySelector('.slide>ul') //获取存放旋转轮播图的容器；这里是定位父元素
var arrow = document.querySelector('.arrow') //获取存放左右切换按钮容器
var slideList = ul.children //每一个轮播图容器集合
console.log(ul)
var timer = null //开启定时器实现自动轮播
// 3.给容器添加数据，渲染好界面
function renderData(){
	for(var i = 0;i<slideList.length;i++){
		animate(slideList[i],spinArr[i])
	}
}
renderData()
// 4.给轮播图实现自动播放
function autoplay(){
	timer = setInterval(function(){
		spinArr.push(spinArr.shift())
		renderData()
	}, 2000)
}
autoplay()
