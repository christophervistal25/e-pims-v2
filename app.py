# import glob
# import os.path
# from PIL import Image
# import cv2
# from numpy import size
# from pyparsing import hexnums

# CORRUPTED_FILE = 0

# print("Invalid Images\n\n")
# for img in glob.glob("C:\\employees\\*.jpg"):
#      file_size = os.path.getsize(img)
#      im = Image.open(img)
#      width, height = im.size
#      if(width >= 751 and height >= 751):
#           print("Image Path : " + img + "\nwidth : " + str(width) + "\nheight : " + str(height) + "\n------------------------------")
#      if file_size == CORRUPTED_FILE:
#           [employee_id, extension] = img.split(".")
#           employee_id = employee_id.replace("C:\\employees\\", "")
#           image = Image.open(r"./0275.jpg")
#           image.save("C:\\employees\\" + employee_id + ".jpg") 

