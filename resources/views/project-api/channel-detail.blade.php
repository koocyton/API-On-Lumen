						<div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　API 调试　　/channel-detail/{channel_id}</b>
									</td>
									<td class="ct-nav-right">
									</td>
								</tr>
							</table>
						</div>

						<div class="content-body radius-5 content-border" style="padding:20px;">
							<table class="notes-table">
    							<tbody>
                                    <tr>
										<td style="width:80px;">接　　口：</td>
										<td colspan="2">客户端通过此接口获取频道的数据 </td>
									</tr>
                                    <tr>
										<td>请求地址：</td>
										<td colspan="2">
											<b>/channel-detail/{channel_id}</b>
										</td>
									</tr>
                                    <tr>
										<td>请求方法：</td>
										<td style="width:80px;">GET</td>
										<td></td>
									</tr>
                                    <tr>
										<td>返回类型：</td>
										<td><b>title</b></td>
										<td>标题</td>
									</tr>
                                    <tr>
										<td></td>
										<td><b>portrait</b></td>
										<td>竖图</td>
									</tr>
                                    <tr>
										<td></td>
										<td><b>landscape</b></td>
										<td>横图</td>
									</tr>
                                    <tr>
										<td></td>
										<td><b>panorama</b></td>
										<td>宽图</td>
									</tr>
                                    <tr>
										<td></td>
										<td><b>toedge</b></td>
										<td>顶边宽图</td>
									</tr>
                                    <tr>
										<td></td>
										<td><b>program</b></td>
										<td>栏目</td>
									</tr>
                                    <tr>
										<td></td>
										<td><b>people</b></td>
										<td>人物</td>
									</tr>
                                    <tr>
										<td>返回字段：</td>
										<td><b>image</b></td>
										<td>图片地址</td>
									</tr>
                                    <tr>
										<td></td>
										<td><b>caption</b></td>
										<td>粗标题</td>
									</tr>
                                    <tr>
										<td></td>
										<td><b>intro</b></td>
										<td>介绍说明</td>
									</tr>
                                    <tr>
										<td></td>
										<td><b>flag</b></td>
										<td>左上角标</td>
									</tr>
                                    <tr>
										<td></td>
										<td><b>mark</b></td>
										<td>右下标记</td>
									</tr>
                                    <tr>
										<td></td>
										<td><b>target</b></td>
										<td>跳转目标</td>
									</tr>
                                    <tr>
										<td></td>
										<td><b>target_type</b></td>
										<td>跳转的目标类型</td>
									</tr>
                                    <tr>
										<td>请求参数：</td>
										<td><b>null</b></td>
										<td></td>
									</tr>
                                    <tr>
										<td>发送头：<br>Authorization</td>
										<td colspan="2" >
											<textarea style="height:80px;width:800px;" class="text-input">{{ $authorization }}</textarea>
										</td>
									</tr>
                                    <tr>
										<td>返回说明：</td>
										<td colspan="2">
<textarea wrap="off" style="height:500px;width:800px;overflow:scroll;" class="text-input">
{
  "channel": [
    "0":[
      {
        "type":"toedge",
        "data":[
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/11\/09\/2015\/51_0_0_0_toedge.png","caption":"\u4f60\u3010\u8868\u60c5\u3011"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/09\/09\/2015\/51_0_0_1_toedge.png","caption":"12","target":"15","target_type":"video"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/09\/09\/2015\/51_0_0_2_toedge.png","caption":"32"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/09\/09\/2015\/51_0_0_3_toedge.png","caption":"123"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/09\/09\/2015\/51_0_0_4_toedge.png","caption":"123"}
        ]
      }
    ],
    "1":[
      {
        "type":"title",
        "data":[
          {"caption":"\u5927\u6bdb"}
        ]
      },
      {
        "type":"panorama",
        "data":[
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/09\/09\/2015\/51_1_1_0_panorama.png","caption":"111","mark":"33","flag":"22"}
        ]
      },
      {
        "type":"landscape",
        "data":[
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/09\/09\/2015\/51_1_2_0_landscape.png","caption":"a","intro":"b","mark":"d","flag":"c"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/11\/09\/2015\/51_1_2_1_landscape.png","caption":"2","intro":"3","mark":"5","flag":"4"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/12\/09\/2015\/51_1_2_2_landscape.png","caption":"11","intro":"22","mark":"cc","flag":"bb"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/11\/09\/2015\/51_1_2_3_landscape.png","caption":"1","intro":"2","mark":"4","flag":"3"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/12\/09\/2015\/51_1_2_4_landscape.png","caption":"\u4e09\u56fd","intro":"\u4f20\u5947","mark":"12:12","flag":"\u6700\u70ed","target":"5","target_type":"video"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/14\/09\/2015\/51_1_2_5_landscape.png","caption":"111","intro":"222","mark":"4444","flag":"333","target":"15","target_type":"video"}
        ]
      }
    ],
    "2":[
      {
        "type":"portrait",
        "data":[
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/09\/09\/2015\/51_2_0_0_portrait.png","caption":"\u5723\u6597\u58eb\u661f\u77e2","intro":"\u7b2c12 \u96c6","mark":"31:00","flag":"\u65b0\u7247"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/07\/09\/2015\/6151_portrait.png","caption":"ababa","intro":"adafsafs","mark":"asfsafa","flag":"sfsafsa"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/14\/09\/2015\/51_2_0_2_portrait.png","caption":"111","intro":"222","mark":"444","flag":"333","target":"692","target_type":"program"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/12\/09\/2015\/51_2_0_3_portrait.png","caption":"adsfa","intro":"dfdf","mark":"sadf","flag":"sdfsaf"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/channel\/14\/09\/2015\/51_2_0_4_portrait.png","caption":"2222","intro":"333","mark":"555","flag":"444"},
          {"image":"http:\/\/cdn.mvod.doopp.com\/poster\/07\/09\/2015\/6151_portrait.png","caption":"12","intro":"1231","mark":"123131","flag":"123131"}
        ]
      }
    ]
  ]
}</textarea></td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="content-body radius-5 content-border" style="padding:20px;">
							<table class="notes-table">
    							<tbody>
    								<tr>
    									<td style="width:610px;">
											<div style="width:600px;position:relative;">
												<dl><dd>
												<input class="text-input" value="API 请求地址：  http://{{ $_SERVER["HTTP_HOST"] }}/channel-detail/{channel_id}" readonly="true" type="text">
												</dd></dl>
											</div>
    									</td>
										<td style="width:80px;">
											<a href="/channel-detail/1" header='{ "Authorization": "{{ urlencode($authorization) }}" }' pushstate="no" container="#debug-response-container">
											<button type="button" class="button-btn" style="width:70px;">测试接口 1</button>
											</a>
										</td>
										<td style="width:80px;">
											<a href="/channel-detail/2" header='{ "Authorization": "{{ urlencode($authorization) }}" }' pushstate="no" container="#debug-response-container">
											<button type="button" class="button-btn" style="width:70px;">测试接口 2</button>
											</a>
										</td>
										<td style="width:80px;">
											<a href="/channel-detail/3" header='{ "Authorization": "{{ urlencode($authorization) }}" }' pushstate="no" container="#debug-response-container">
											<button type="button" class="button-btn" style="width:70px;">测试接口 3</button>
											</a>
										</td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>