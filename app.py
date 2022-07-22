import glob
import os.path
from PIL import Image
from numpy import size
from pyparsing import hexnums
import numpy as np

CORRUPTED_FILE = 0
INVALID_IMAGE_SIZE = 0
INVALID_EMPLOYEE_IDS = []



for img in glob.glob("C:\\laragon\\www\\e-pims\\public\\assets\\images\\*.jpg"):
     file_size = os.path.getsize(img)
     im = Image.open(img)
     width, height = im.size

    #  [employee_id, extension] = img.split(".")
    #  employee_id = employee_id.replace("C:\\laragon\\www\\e-pims\\public\\assets\\images\\", "")

    # Check if the picture has red background
    #  img = cv2.imread(img)
    #  if(np.array(img)[0][0][0] < 100) :
    #     print('Red is present!' + str(employee_id))
    #  if file_size == CORRUPTED_FILE :
    #     # Replacing the corrupted image with a default image.
    #     [employee_id, extension] = img.split(".")
    #     employee_id = employee_id.replace("C:\\laragon\\www\\e-pims\\public\\assets\\images\\", "")
    #     image = Image.open(r"./0275.jpg")
    #     image.save("C:\\laragon\\www\\e-pims\\public\\assets\\images\\" + employee_id + ".jpg")

   
    #  if employee_id != "1898" :
    # Resizing the image to 320x378
    #  print("Image Path : " + img + "\nwidth : " + str(width) + "\nheight : " + str(height) + "\n------------------------------")
    #  [employee_id, extension] = img.split(".")
    #  employee_id = employee_id.replace("C:\\laragon\\www\\e-pims\\public\\assets\\images\\", "")
    #  image = Image.open(r"C:\\laragon\\www\\e-pims\\public\\assets\\images\\" + employee_id + ".jpg")
    #  resizedImage  = image.resize((320, 378))
    #  resizedImage.save("C:\\laragon\\www\\e-pims\\public\\assets\\images-2\\" + employee_id + ".jpg") 
    #  INVALID_EMPLOYEE_IDS.append(employee_id)
    #  INVALID_IMAGE_SIZE += 1

# print("No. of Invalid Images : " + str(INVALID_EMPLOYEE_IDS))
