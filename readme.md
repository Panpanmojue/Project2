Project1设计文档
==========

## 个人信息
### 姓名：夏梦洁<br/>
### 学号：19302010081

-------------------

## 项目地址
`Github地址：`https://github.com/PanpanMojue/Project2<br/>


-------------------
## 项目完成情况

除Bonus外其他功能都已实现<br/>
基本上是在pj1的基础上进行修改的，所以沿用了原来的css<br/>
写pj2的时候遇到的问题主要是一开始没看懂数据库，找不到图片的city,country在哪，表里面的命名有些混乱，后来才知道其中的对应关系

### home页面
1.首先用`isset($_SESSION['UserName'])`是否为true来检测用户是否已经登陆，<br/>
如果成功登陆导航栏会出现下拉页面，没有登陆则没有下拉。其他页面的导航栏同理。
2.通过travelimage表中的UID对图片的热门程度进行筛选，并将UID值高的图片展示在首页，刷新之后random挑选
3.点击图片或者图片标题后可以跳转到详情页，具体实现方法是，从数据库中读取所点击图片的ImageID,然后跳转到`details.php?id = '$ImageID''`

### details页面
根据点击图片时传过来的ImageID在数据库中进行搜索，其中Title,Description和likeNumber(即UID)可以直接得到<br/>
而country需要将表travelimage中的Country_RegionCodeISO与表geocountries_regions中的ISO相对应，再读出表geocountries_regions中的Country_RegionName即为country.<br/>
同理，city需要将表travelimage中的 与表geocities中的CityCode相对应，再读出表geocities中的AsciiName即为city <br/>

### logIn、logOut和register
进入home页面时，若用户没有登陆，可浏览大部分页面，但是必须登陆后才可查看图片详情页，进行上传、收藏等功能<br/>
当浏览者要使用这些功能时，引导他们先进行登陆，用表单传过来的用户名和密码与数据库中的traveluser进行匹配，配对成功后登陆成功<br/>
这里要注意的是用户可以通过输入用户名或电子邮箱进行登陆，所以要匹配数据库中的两个结果<br/>
登陆时引导没有注册的用户进行注册，在用户提交表单时先验证表单的合法性（是否有项目未输入，两次密码是否一样，邮件地址是否符合逻辑）<br/>
表单合法则成功提交，并将相关数据写入数据库

### search页面
用户可通过一个单选框选择是Search By Title or by Description,同样通过表单提交，然后通过模糊搜索与数据库相匹配，之后跳转到出现结果的页面

### upload页面
重点1：二级联动 由于国家和城市太多，尝试从数据库中读取发现太卡了 于是转用微信群里大佬提供的city.txt
先写一个方法以获得countries的数组，然后类似于pj1中二级联动的做法实现二级联动 又是一次在数据库中不停跳跃的过程
重点2：将用户上传的图片保存在images文件夹中，这样才可以看到自己上传的图片

### browser页面
二级联动同上

### favour、myphoto页面
读取到用户的UID之后，在表travelimagefavor里搜寻相对应的用户收藏，并将其展示出来





-------------------

## Bonus完成情况
 未完成


## 对pj2的想法<br/>
做PJ的过程虽然的确有点压抑，但是真的能学到很多东西，比看书看视频啥的有实践意义多了。<br/>
但感觉pj2的指令没有pj1那么详细orz whatever这个学期份平地起高楼结束拉！


