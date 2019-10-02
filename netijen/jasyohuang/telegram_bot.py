# Telegram bot by jasyohuang
# github.com/jasyohuang
# change trustedUser with your telegram username
# change ##YOUR BOT TOKEN## with your telegram bot token given by botfather
# use wisely :v

from telegram.ext import Updater
import logging
from telegram.ext import CommandHandler
from telegram.ext import MessageHandler, Filters
import os
import autopy
import ctypes
import numpy
from cv2 import *
from pywinauto.application import Application
import win32api
# from pygame import mixer

trustedUser = "##YOURUSERNAME##"
#ini buat bkin no console
ctypes.windll.user32.ShowWindow(ctypes.windll.kernel32.GetConsoleWindow(), 0)

updater = Updater(token = '##YOUR BOT TOKEN##')
dispatcher = updater.dispatcher
logging.basicConfig(filename='logs.log', filemode='a', level=logging.DEBUG)

def type(bot, update, args):
	username = update.message.from_user.username
	if username == trustedUser : 
		bot.send_message(chat_id = update.message.chat_id, text = "udah diketikin")
		app = Application().start('notepad.exe')
		app.UntitledNotepad.Edit.type_keys(args[0], with_spaces = True)
	else :
		bot.send_message(chat_id = update.message.chat_id, text = "siapa lu")

type_handler = CommandHandler('type', type, pass_args = True)
dispatcher.add_handler(type_handler)



def start(bot, update):
	username = update.message.from_user.username
	if username == trustedUser :
		bot.send_message(chat_id = update.message.chat_id, text="hai tuan YOURNAME :v")
	else :
   		bot.send_message(chat_id=update.message.chat_id, text="hello "+ update.message.from_user.first_name + ", bot ini cuma bisa dipake oleh YOURNAME... sorry ya :v")
	# logging.info("started by " + update.message.from_user.username)

start_handler = CommandHandler('start', start)
dispatcher.add_handler(start_handler)


def echo(bot, update):
    bot.send_message(chat_id=update.message.chat_id, text=update.message.text)
    f = open("catatan.txt", "a+")
    f.write(update.message.text + " from " + update.message.from_user.username + "\n")
	# logging.info(update.message.text + ' from ' + update.message.from_user.username)

echo_handler = MessageHandler(Filters.text, echo)
dispatcher.add_handler(echo_handler)

def swapmouse_method(bot , update):
	chat_id = update.message.chat_id
	username = update.message.from_user.username
	if username == trustedUser :
		bot.sendMessage(chat_id, "iseng sekali ya qamu")
		os.system('rundll32 user32,SwapMouseButton')
		logging.info('swapped mouse by ' + update.message.from_user.username)
	else :
		bot.sendMessage(chat_id, "dasar heker iseng ya kamu" )
		logging.info('FAILED swap mouse by ' + update.message.from_user.username)
	

swapmouse = CommandHandler("swapmouse" , swapmouse_method) #/swapmouse
dispatcher.add_handler(swapmouse)

def lock_method(bot, update):
	username = update.message.from_user.username
	chat_id = update.message.chat_id
	if username == trustedUser :
		os.system('rundll32 user32, LockWorkStation')
		bot.sendMessage(chat_id, "udah dilock ya gayn")
		logging.info('locked by ' + update.message.from_user.username)
	else :
		bot.sendMessage(chat_id, "iseng ya qamu")
		logging.info('FAILED lock by ' + update.message.from_user.username)

lock = CommandHandler("lock", lock_method)
dispatcher.add_handler(lock)

def shutdown_method(bot, update):
	username = update.message.from_user.username
	chat_id = update.message.chat_id
	if username == trustedUser :
		os.system('shutdown /s /t 1')
		bot.sendMessage(chat_id, "udah dishutdown ya gayn")
	else :
		bot.sendMessage(chat_id, "siapa lu mau ngatur laptop gw ?")
		logging.info('FAILED shut down by ' + update.message.from_user.username)
	

shutdown = CommandHandler("shutdown", shutdown_method)
dispatcher.add_handler(shutdown)

def screenshot_method(bot , update):
	chat_id = update.message.chat_id
	username = update.message.from_user.username
	if username == trustedUser :
		bot.sendMessage(chat_id , "tunggu cuk")
		image = autopy.bitmap.capture_screen()
		image.save("D:\\ScreenShot.png")
		chat_id = update.message.chat_id
		photo = open("D:\\ScreenShot.png" , "rb")
		bot.sendPhoto(chat_id,photo,"skrinsut")
		photo.close()
		os.system("rm D:/ScreenShot.png")
		logging.info('screenshot by ' + update.message.from_user.username)
	else :
		bot.sendMessage(chat_id, "siapa lu mau skrinsut gw ?")
		logging.info('FAILED screenshot by ' + update.message.from_user.username)
	

screenshot = CommandHandler("screenshot", screenshot_method)
dispatcher.add_handler(screenshot)

def snapshot_method(bot, update):
	chat_id = update.message.chat_id
	username = update.message.from_user.username
	if username == trustedUser :
		bot.sendMessage(chat_id, "bentar ya bang")
		cam = VideoCapture(0)   # 0 -> index of camera
		s, img = cam.read()
		if s: 
		    waitKey(0)
		    imwrite("D:/snapshot.jpg",img) #save image
		    photo = open("D:/snapshot.jpg", "rb")
		    bot.sendPhoto(chat_id, photo, "foto")
		    photo.close()
		    os.system("rm D:/snapshot.jpg")
		cam.release()
		logging.info('snapshot by ' + update.message.from_user.username)
	else :
		bot.sendMessage(chat_id, "heker ga sopan")
		logging.info('FAILED snapshot by ' + update.message.from_user.username)
	

snapshot = CommandHandler("snapshot", snapshot_method)
dispatcher.add_handler(snapshot)

def next_song(bot, update) :
	chat_id = update.message.chat_id
	username = update.message.from_user.username
	if username == trustedUser :
		VK_MEDIA_NEXT_TRACK = 0xB0
		neks = win32api.MapVirtualKey(VK_MEDIA_NEXT_TRACK, 0)
		win32api.keybd_event(VK_MEDIA_NEXT_TRACK, neks)
		bot.sendMessage(chat_id, "udah next song")
	else :
		bot.sendMessage(chat_id, "ga sopan ya")

nextsong = CommandHandler("nextsong", next_song)
dispatcher.add_handler(nextsong)

def prev_song(bot, update) :
	chat_id = update.message.chat_id
	username = update.message.from_user.username
	if username == trustedUser :
		VK_MEDIA_PREV_TRACK = 0xB1
		prev = win32api.MapVirtualKey(VK_MEDIA_PREV_TRACK, 0)
		win32api.keybd_event(VK_MEDIA_PREV_TRACK, prev)
		bot.sendMessage(chat_id, "udah prev song")
	else :
		bot.sendMessage(chat_id, "ga sopan ya")

prevsong = CommandHandler("prevsong", prev_song)
dispatcher.add_handler(prevsong)

def pause(bot, update) :
	chat_id = update.message.chat_id
	username = update.message.from_user.username
	if username == trustedUser :
		VK_MEDIA_PLAY_PAUSE = 0xB3
		pause = win32api.MapVirtualKey(VK_MEDIA_PLAY_PAUSE, 0)
		win32api.keybd_event(VK_MEDIA_PLAY_PAUSE, pause)
		bot.sendMessage(chat_id, "udah pause song (toggle sih :v)")
	else :
		bot.sendMessage(chat_id, "ga sopan ya")

pause = CommandHandler("pause", pause)
dispatcher.add_handler(pause)

def mute(bot, update) :
	chat_id = update.message.chat_id
	username = update.message.from_user.username
	if username == trustedUser :
		VK_VOLUME_MUTE = 0xAD
		mute = win32api.MapVirtualKey(VK_VOLUME_MUTE, 0)
		win32api.keybd_event(VK_VOLUME_MUTE, mute)
		bot.sendMessage(chat_id, "udah di mute");
	else :
		bot.sendMessage(chat_id, "ga sopan ya")

mute = CommandHandler("mute", mute)
dispatcher.add_handler(mute)

def volume_up(bot, update, args) :
	chat_id = update.message.chat_id
	username = update.message.from_user.username
	if username == trustedUser :
		repeat = int(args[0])
		VK_VOLUME_UP = 0xAF
		vol_up = win32api.MapVirtualKey(VK_VOLUME_UP, 0)
		for x in range (1,repeat) :
			win32api.keybd_event(VK_VOLUME_UP, vol_up)
		bot.sendMessage(chat_id, "volume up sebanyak " + args[0] +" kali")
	else :
		bot.sendMessage(chat_id, "ga sopan ya")

volup = CommandHandler("volup", volume_up, pass_args = True)
dispatcher.add_handler(volup)

def volume_down(bot, update, args) :
	chat_id = update.message.chat_id
	username = update.message.from_user.username
	if username == trustedUser :
		repeat = int(args[0])
		VK_VOLUME_DOWN = 0xAE
		vol_down = win32api.MapVirtualKey(VK_VOLUME_DOWN, 0)
		for x in range (1,repeat) :
			win32api.keybd_event(VK_VOLUME_DOWN, vol_down)
		bot.sendMessage(chat_id, "volume down sebanyak " + args[0] + " kali")
	else :
		bot.sendMessage(chat_id, "ga sopan ya")

voldown = CommandHandler("voldown", volume_down, pass_args = True)
dispatcher.add_handler(voldown)

# def play_song(bot, update):
# 	username = update.message.from_user.username
# 	chat_id = update.message.chat_id
# 	if username == trustedUser :
# 		mixer.init()
# 		mixer.music.load("song.mp3")
# 		mixer.music.play()
# 		bot.sendMessage(chat_id, "udah diplay ya gayn")
# 		logging.info('locked by ' + update.message.from_user.username)
# 	else :
# 		bot.sendMessage(chat_id, "iseng ya qamu")
# 		logging.info('FAILED lock by ' + update.message.from_user.username)

# playsong = CommandHandler("playsong", play_song)
# dispatcher.add_handler(playsong)

# def stop_song(bot, update):
# 	mixer.music.stop()
# stopsong = CommandHandler("stopsong", stop_song)
# dispatcher.add_handler(stopsong)

updater.start_polling()
