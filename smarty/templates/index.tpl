<style>
    body{
        font-size: 30px;
    }
</style>
<html>

<body>
    <b>基本變數印出</b><br>
    Hello,{{$name}}Welcome to Smarty!<br>
    Member:{{$name2}}<br><br>
    <b>一維陣列印出</b><br>
    {{$user.name}}的生日是{{$user.birthday}}<br><br>
    <b>二維陣列印出</b><br>
    {{$users.1.name}}的生日是{{$users.1.birthday}}<br>
    {{$users.2.name}}的生日是{{$users.2.birthday}}<br><br>
    <b>二維陣列印出(for each))</b><br>
    {{foreach $users as $user}}
    {{$user@iteration}} (為第N筆資料)
    {{$user.name}} 的生日是{{$user.birthday}}<br>
    {{/foreach}}
    <br>
    <b>輸入印出$smarty.get</b><br>
    <form method="">
        <input type="text" name="test" id="test">
        <button type="submit">送出</button><br>
    </form>
    {{if isset($smarty.get.test)}}
    您輸入的是:{{$smarty.get.test}}<br><br>
    {{/if}}

    <b>while迴圈</b><br>
    {{while $x<=9}} {{$x=$x+1}} {{$x}} *{{$y}}={{$x*$y}} <br>
        {{/while}}
        <hr>
        <b>for迴圈</b><br>
        {{for $x=2 to 9}}
        {{for $y=1 to 9}}
        {{$x}}*{{$y}}={{$x*$y}}
        <br>
        {{/for}}
        <hr>
        {{/for}}

        <h2>Git練習</h2>
        <img class="book" src="11.jpg" alt="" width="872" height="900">
        <img class="book" src="13.jpg" alt="" width="872" height="403">
        <img class="book" src="12.jpg" alt="" width="1800" height="1000">
        <div id="clickme">
                <b>隱藏圖片</b><br>
            </div>
        <p>
            <h3>git指令筆記</h3>
        git checkout Head~4<br>
        git branch -f master Head~3(移動分支到某地))<br>
        git reset HEAD~1(還原)<br>
        git revert HEAD(還原不能修改的branch)<br>
        git cherry-pick C2 C4(複製)<br>
        git rebase -i HEAD~4<br>
        git tag 訊息 位置(標籤)<br>
        git describe (離指定(HEAD)最近的TAG)<br>
        git bisect(找尋有Bug的commit指令)<br>
        git fetch (抓取資料)<br>
        git pull(把資料抓下來)
        git push(把資料推上去)
        git fakeTeamwork(傳給遠地端commit)
        git checkout -b side o/master(追蹤 PUSH之後同步到最前面)
        git push location(origin) place (ex:push o/master master push A到某地)
        git push origin master(位置):foo(要移動的子元素o/foo)
        git push origin :foo (刪除已經有的(foo))
        git fetch origin :foo(新增沒有的(支線))
        git pull origin bar:foo
        git pull origin master:side
        </p>

       
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $("#clickme").click(function () {
                $(".book").toggle("fast", function () {
                });
            });
</script>