import selenium
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.common.exceptions import WebDriverException
import os
import time
import requests
import argparse
import base64

parser = argparse.ArgumentParser()
parser.add_argument("-url",  type=str)
args=parser.parse_args()
url=base64.b64decode(args.url).decode("utf-8") 

domain='xxx.xxx.xxx.xxx' # 注意，在本地测试时，不能用localhost访问，要用127访问（在url中）
port='5000'
pre_path=''

from pyvirtualdisplay import Display
display=Display(visible=0,size=(800,800))
display.start()


try:
    browser = webdriver.Firefox()
    browser.set_page_load_timeout(1000)#时长不够时，在恶劣的网络环境下会崩；建议调大点
    browser.set_script_timeout(1000)
    print(url)

    print(1)

    browser.get('http://'+domain+':'+port)
   
    browser.add_cookie({'name': 'flag',
                            'value': 'fl4g{Y0u_w0n_th3_G4m3}',
                            'domain': domain,
                            'path': pre_path+'/hachp1/wuziqi/'})
   
    browser.add_cookie({'name': 'flag',
                        'value': 'fl4g{l0v3_15_s0_w4rm}',
                        'domain': domain,
                        'path': pre_path+'/hachp1/love/'})
   
    browser.add_cookie({'name': 'flag',
                            'value': 'fl4g{1_l1k3_pl4Y1ng_w1th_4L1}',
                            'domain': domain,
                            'path': pre_path+'/hachp1/pintu/'})
   
    cookies = browser.get_cookies() 
    print(cookies)
    
    print(2)
    browser.get(url)
    while 1:
        try:
            browser.switch_to_alert().accept()
        except selenium.common.exceptions.NoAlertPresentException:
            break
            
    print(time.strftime("%Y-%m-%d %X", time.localtime()))
    browser.quit()
except Exception as e:
    print ("[error] "+str(e))
    browser.quit()
