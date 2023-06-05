import requests
import openai


API_KEY='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'
org_content='hello'
openai.api_key = API_KEY
response = openai.ChatCompletion.create(
max_tokens= 450,
model="gpt-3.5-turbo",
messages=[
        {"role": "user", "content":org_content},
    ]
)

result = ''
for choice in response.choices:
    result += choice.message.content

print(result)