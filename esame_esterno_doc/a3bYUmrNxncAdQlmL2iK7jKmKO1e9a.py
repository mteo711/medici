#!/usr/bin/python
#-*- coding: utf-8 -*-
"""
YahooTrafficInformation.py
~~~~~~~~~~~~~~~~~~~~~~~~~~
:copyright: Copyright (c) 2015, National Institute of Information and Communications Technology.All rights reserved.
:license: GPL3, see LICENSE for more details.
"""
import sys
import udspm
udspm.use_sdk("1.10.0")

import datetime
import urllib2
from uds.abstract.tmpl.HttpSensor import HttpSensor



class YahooTrafficInformation(HttpSensor):
	'''
	classdocs
	'''
	def __init__(self):
		'''
		Constructor
		'''
		HttpSensor.__init__(self)

		# Sensorクラスの設定 -------------------------------------------------------
		# タイトルを設定
		self._title = "YahooTrafficInformation"
		# タイムゾーン
		self._timeOffset = '+0900'

		# M2Mデータフォーマットに必要なデータ
		self._M2MInfo['srcContact'] = ''
		self._M2MInfo['createdContact'] = 'Test User<testuser@example.com'
		self._M2MInfo['device']['capability']['frequency'] = {'type': 'minute', 'count': 10}
		self._M2MInfo['tag'] = ''

		self.selectOutput('SCN')
		self._scnInfo  = {"category":"sensor", "server":"yahoo", "type":"traffic"}

		# HttpSensorクラスの設定 -----------------------------------------------------
		# URLを設定
		self._url = 'http://transit.loco.yahoo.co.jp/traininfo/area/6/'
		self._dirFileNumMax = 1400      # 同一ディレクトリに入れる最大ファイル数    #!!

		# intervalを設定(10分)
		self.setInterval(10*60)

		# オリジナルの設定 -----------------------------------------------
		self._setdata()

	def _setdata(self):
		# 単位
		self._unitHash = {
							"rainfall"        : "mm"     #!!
		}
		# データのタイプ
		self._dataTypeHash = {
							   'time'         : 'datetime',
							   'latitude'     : 'string',
							   'longitude'    : 'string',
							   'Rail_Name'    : 'string',
							   'Condition'    : 'string',
							   'Detail'       : 'string',
		}


	def Extract(self, htmlString, uri):
		self._utilHtmlParser.setHtmlString(htmlString)

		geocoder = self._utilGeocoder()

		# 現在時間取得
		timeStr = datetime.datetime.now().strftime(u'%Y-%m-%d %H:%M:%S')

		tableList      = []
		deviceInfoList = []

		# 交通情報データ取得
		#
		#  取得元HTML
		#    <div class="labelSmall">
		#    <h3 id="item8" class="title">JR西日本</h3>
		#    </div>
		#
		#    <div class="elmTblLstLine">
		#    <table>
		#    <tr>
		#    <th>路線</th>
		#    <th>状況</th>
		#    <th>詳細</th>
		#    </tr>
		#
		#    <tr>
		#    <td><a href="http://transit.yahoo.co.jp/traininfo/detail/263/0/">大阪環状線</a></td>
		#    <td>平常運転</td>
		#    <td>事故・遅延情報はありません</td>
		#    </tr>
		#      :
		#    <tr>
		#    <td><a href="http://transit.yahoo.co.jp/traininfo/detail/547/0/">山陰本線[園部～鳥取]</a></td>
		#    <td><span class="icnAlert">[!]</span><span class="colTrouble">運転見合わせ</span></td>
		#    <td>大雨の影響で、和田山～豊岡駅間の...</td>
		#    </tr>
		#      :
		#    </table>
		#    </div><!--/.elmTblLstLine-->
		trList = self._utilHtmlParser.getDataXpath('//*[@id="item8"]/../following-sibling::node()[2]/table/tr')
		for tr in trList:
			if len( tr.xpath('td') ) == 0:
				continue

			# 路線名、状況、詳細情報の取得
			rail_name, condition, detail = self._getTableData(tr)
			if rail_name == None:
				continue

			tableData  = {}
			deviceInfo = {}

			tableData['Rail_Name']  = rail_name
			tableData['Condition']  = condition
			tableData['Detail']     = detail

			# 時間情報を取得 ------------------------------------------------------
			tableData['time']       = timeStr

			# 位置情報を取得 ----------------------------------------------------
			deviceInfo["longitude"] = rail_location[rail_name][0]
			deviceInfo["latitude"]  = rail_location[rail_name][1]

			tableList.append(tableData)
			deviceInfoList.append(deviceInfo)

		# データタイプをチェックする
		self._utilCheckDataType(tableList, self._dataTypeHash, self._timeOffset)
		self._utilCheckDataType(deviceInfoList, self._dataTypeHash, self._timeOffset)

		# 前回格納データを削除する
		self._utilcheckOverlapData.deleteOvarlapData(tableList, deviceInfoList)

		return tableList, deviceInfoList, self._unitHash


	def _getTableData(self, tr):
		# 路線名の取得
		rail_path = 'td[1]/a/text()'
		if len( tr.xpath(rail_path) ) == 1:
			rail_name = tr.xpath(rail_path)[0].encode('utf-8')
		else:
			rail_name = None

		# 状況の取得
		condition_path = 'td[2]/text()'
		if len( tr.xpath(condition_path) ) == 1:
			condition = tr.xpath(condition_path)[0].encode('utf-8')
		elif len( tr.xpath(condition_path) ) == 0:
			trouble_condition_path = 'td[2]/span[2]/text()'
			if len( tr.xpath(trouble_condition_path) ) == 1:
				condition = tr.xpath(trouble_condition_path)[0]
			else:
				condition = None
		else:
			condition = None

		# 詳細情報の取得
		detail_path = 'td[3]/text()'
		if len( tr.xpath(detail_path) ) == 1:
			detail = tr.xpath(detail_path)[0].encode('utf-8')
		else:
			detail = None

		return rail_name, condition, detail


# JR西日本（近畿）の路線と位置情報
rail_location = {
	"大阪環状線":[135.3,34.4],
	"JRゆめ咲線":[135.434001,34.664533],
	"JR宝塚線":[135.341416,34.810781],
	"琵琶湖線":[136.13401,35.142137],
	"JR京都線":[135.758463,34.98341],
	"湖西線":[135.95957,35.235768],
	"草津線":[135.962616,35.02176],
	"嵯峨野線":[135.583697,35.016814],
	"学研都市線":[135.791402,34.760152],
	"JR東西線":[135.496652,34.698102],
	"JR神戸線":[135.177507,34.678963],
	"阪和線":[135.503718,34.593122],
	"紀勢本線[和歌山～和歌山市]":[135.16666,34.236121],
	"羽衣線":[135.443095,34.535167],
	"大和路線":[135.817921,34.680626],
	"関西本線[亀山～加茂]":[135.870659,34.752755],
	"奈良線":[135.800355,34.889927],
	"桜井線":[135.847157,34.513664],
	"和歌山線":[135.287124,34.246095],
	"関西空港線":[135.242616,34.436514],
	"和田岬線":[135.175214,34.656686],
	"きのくに線":[135.994728,33.724582],
	"加古川線":[134.839588,34.768302],
	"播但線":[134.692544,34.827792],
	"舞鶴線":[135.393975,35.468571],
	"小浜線":[135.744943,35.491919],
	"福知山線[篠山口～福知山]":[135.177856,35.0565],
	"山陰本線[園部～鳥取]":[134.22481,35.494029],
	"おおさか東線":[135.57778,34.650303]
}

if __name__ == '__main__':

	sensor = YahooTrafficInformation()
	sensor.Run()
	pass