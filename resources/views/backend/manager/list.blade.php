<br>

<div class="container">
    <!-- Static navbar -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="javascript:;" style="margin:5px -10px;"><b>用户管理</b></a></li>
                </ul>
            </div>
            <div class="navbar-form navbar-right">
                <button class="btn btn-success btn-sm" style="margin-left:20px;" type="button" onclick="$.KTAnchor.popupLoader('/manager/apply')">
                    增加管理员
                </button>
            </div>
        </div>
    </nav>
</div>

<div class="container">
    <table class="table table-hover table-bordered">
        <thead>
        <tr class="active">
            <th>
                状态　 ID　　 账号
                <div style="float:right;">
                    权限组　最近登录
                </div>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="manager in managers" v-on:click="openDetail(manager.id)")
            style="cursor:pointer;overflow:hidden;" >
            <td>
                <span v-if="manager.deleted_at==0" class="label label-success">激活</span>
                <span v-else class="label label-danger">禁用</span>
                <span style="display:inline-block;margin:0 5px;">
                    <span style="display:inline-block;min-width:40px;">@{{ manager.id }}</span>
                    &nbsp;
                    @{{ manager.username }}
                    &lt; @{{ manager.account }} &gt;
                </span>

                <div style="float:right;">
                    <span style="margin-right:5px;">
                        @{{ manager.groupings }}
                    </span>
                    <span data-toggle="tooltip" data-placement="left" title="@{{ manager.updated_at }}">
                        <span style="color:red;" v-if="manager.last_span<3600">
                            @{{  Math.floor(manager.last_span/60) }} 分钟
                        </span>
                        <span style="color:red;" v-if="manager.last_span>=3600 && manager.last_span<86400">
                            @{{ Math.floor(manager.last_span/3600) }} 小时
                        </span>
                        <span style="color:blue;" v-if="manager.last_span>=86400 && manager.last_span<603800">
                            @{{  Math.floor(manager.last_span/86400) }} 天前
                        </span>
                        <span style="color:blue;" v-if="manager.last_span>=603800 && manager.last_span<2678400">
                            @{{  Math.floor(manager.last_span/603800) }} 周前
                        </span>
                        <span style="color:green;" v-if="manager.last_span>=2678400 && manager.last_span<31536000">
                            @{{  Math.floor(manager.last_span/2678400) }} 月前
                        </span>
                        <span style="color:green;" v-if="manager.last_span>=31536000">
                            @{{  Math.floor(manager.last_span/31536000) }} 年前
                        </span>
                    </span>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<div class="container">
    <div class="paging-container" style="text-align:right;" total="10000" current="1" limit="100"></div>
</div>

<script>
    new Vue({
        el: "#main-content",
        data: {
            now_time : <?=time()?>,
            managers: [
                <?php foreach ($managers as $manager) { ?>
                {
                <?=App\Utils\ArrayUtil::getJsObject($manager->getAttributes())?>
                "last_span"  : '<?=NOW_TIME?> - <?=$manager->updated_at?>',
                    "style_obj"  : {
                        "color"  : "<?=$manager->deleted_at?>" == "" ? "" : "#bbb",
                        "text-decoration": "<?=$manager->deleted_at?>" == "" ? "" : "line-through",
                    }
                },
              <?php } ?>
            ]
        },
        "methods": {
            "openDetail": function (id) {
                $.KTAnchor.popupLoader('/manager/' + id);
            }
        }
    })
</script>
