1.安装python3 selenium firefox requests环境。
环境推荐版本（ 版本不匹配有很多坑，你也可以自己踩坑:) ）：
geckodriver-v0.21.0-linux64.tar.gz
firefox 66.0
selenium 3.141.0


2.更改xss_bot.py中的domain和**pre_path**。修改xss_bot.py中使用的浏览器为本机安装的浏览器驱动，注意在无图形化服务器上需要增加相应的代码。
3.调整hachp1/index.php中的命令为符合本机的命令（python3 xxx）。
4.由于网络等原因，在xss_bot.py中的timeout可以调大一点，不然可能收不到cookie。
5.出现 geckodriver.log denied 时需要为PHP添加当前目录写权限。
6.firefox 需要/var/www/.cache/dconf 的写权限。
7.注意调试时输出执行返回操作的代码需要注释掉（index.php中有三处，其中js有一处）。

题目入口：
love: ?greet=Hello
wuziqi: ?guest_name=hachp1
pintu: ?name=hachp1&ft_id=0 ?name=hachp1&ft_id=1 ?name=hachp1&ft_id=2

docker 文件太大并且很丑陋，没放出来