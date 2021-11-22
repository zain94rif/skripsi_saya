import urllib.request

kode = []
kode2 = []
kodebaru = []
user = []

web = 'http://192.168.43.199/002/'
# alamat = web+'/device/nullidtg.php'
# while True:
# 	try:
# 		x = urllib.request.urlopen(alamat)
# 	except:
# 		x = ''
# 		pass
# 	if x != '':
# 		break
# 	# else:
# 		# print('error')

alamat = web+'/device/ambildatauser.php'
while True:
	try:
		x = urllib.request.urlopen(alamat)
	except:
		x = ''
		pass
	if x != '':
		break
	# else:
		# print('error')
mentah = x.read().decode('utf-8')
mentah2 = mentah.split('|')
for i in mentah2:
	if i == '':
		pass
		# print('null')
	else:
		user.append(i)
		# print(i)

tokenbot = '958824542:AAFaeSzKHSY94iGuK_qHQuuE-TbgWbUmEUE'
alamat = 'https://api.telegram.org/bot'+tokenbot+'/getUpdates'
while True:
	try:
		x = urllib.request.urlopen(alamat)
	except:
		x = ''
		pass
	if x != '':
		break
	# else:
		# print('error')
mentah = x.read().decode('utf-8')
mentah2 = mentah.split('\n')
for i in mentah2:
	indexId = i.find("\"id\"")
	if indexId != -1:
		indexTitik2Id = i.find(":", indexId)
		indexKomaId = i.find(",", indexTitik2Id)
		idnya = i[indexTitik2Id+1:indexKomaId]

		indexText = i.find("\"text\"")
		indexTitik2Text = i.find(":", indexText)
		indexPetikText = i.find("\"", indexTitik2Text+2)
		msg = i[indexTitik2Text+2:indexPetikText]
		# print(i)
		kode2 = []
		kode2.append(idnya)
		kode2.append(msg)
		kode.append(kode2)

kode2 = []
for i in reversed(kode):
	if i[1].lower() in user:
		if i[0] not in kode2:
			kode2.append(i[0])
			a = i[1].lower()
			ortuada = a.find("ortu")
			print(ortuada)
			if ortuada != -1:
				print('ortu')
				alamat = web+'/device/updateidtg2.php?id='+i[1]+'&tg='+i[0]
				print(alamat)
				while True:
					try:
						x = urllib.request.urlopen(alamat)
					except:
						x = ''
						pass
					if x != '':
						break
					# else:
						# print('error')
			else:
				print('siswa')
				'''
				alamat = web+'/device/updateidtg.php?id='+i[1]+'&tg='+i[0]
				print(alamat)
				while True:
					try:
						x = urllib.request.urlopen(alamat)
					except:
						x = ''
						pass
					if x != '':
						break
				'''
					# else:
						# print('error')
		print(i)

for i in kode2:
	print(i)

'''
for i in kode:
	if i[0].lower() in user:
		print(i)
		print('ada')
		a = i[0].lower()
		ortuada = a.find("ortu")
		print(ortuada)
		if ortuada != -1:
			print('ortu')
			alamat = web+'/device/updateidtg2.php?id='+i[0]+'&tg='+i[1]
			print(alamat)
			while True:
				try:
					x = urllib.request.urlopen(alamat)
				except:
					x = ''
					pass
				if x != '':
					break
				# else:
					# print('error')
		else:
			print('siswa')
			alamat = web+'/device/updateidtg.php?id='+i[0]+'&tg='+i[1]
			print(alamat)
			while True:
				try:
					x = urllib.request.urlopen(alamat)
				except:
					x = ''
					pass
				if x != '':
					break
				# else:
					# print('error')
	# else:
	# 	print('tidak')
'''
