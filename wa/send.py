import requests

def telegram_bot_sendtext(bot_message):

   bot_token = '958824542:AAFaeSzKHSY94iGuK_qHQuuE-TbgWbUmEUE'
   bot_chatID = '126272887'
   # $TOKEN  = "958824542:AAFaeSzKHSY94iGuK_qHQuuE-TbgWbUmEUE";//"TOKENBOT";  // ganti token ini dengan token bot mu
   # $chatid = "126272887";
   send_text = 'https://api.telegram.org/bot' + bot_token + '/sendMessage?chat_id=' + bot_chatID + '&parse_mode=Markdown&text=' + bot_message
   print(send_text)
   response = requests.get(send_text)

   return response.json()


test = telegram_bot_sendtext("Testing Telegram bot")
print(test)