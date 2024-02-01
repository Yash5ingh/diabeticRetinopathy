import cv2
import numpy as np
import tensorflow as tf
import keras
import sys

inp = sys.argv[1]

# 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

image_size = 512
labels = ["No DR", "Mild", "Moderate", "Severe", "Proliferative DR"]

im = cv2.resize(cv2.imread(inp),(image_size,image_size))[:,:,::-1]/255


model = keras.models.load_model("model.h5")

pred = model.predict(np.array([im]),verbose=0)

# valid_classes = [(labels[j], round(pred[0][j]*100)) for j in range(len(labels)) if round(pred[0][j]*100) > 0]
# valid_classes.sort(key=lambda x: x[1], reverse=True)

# res = ""
# for j in range(len(valid_classes)):
#     res += f"<li>{valid_classes[j][0]} : {valid_classes[j][1]}%</li>"



# print(f"<h1>{labels[np.argmax(pred)]}</h1> <div id='confidence'><h4>Confidence in Percentage(%)</h4><ul>{res}</ul></div>")

disease = np.argmax(pred)

print(disease)