# SYSTEMEIO TEST

## CALCULATE-PRICE END POINT HTTP POST REQUEST EXAMPLE VIA CURL

```bash
curl --location 'http://localhost:8000/api/calculate-price' \
--header 'Content-Type: application/json' \
--data '{
    "product": 1,
    "taxNumber": "GR658565478",
    "couponCode": "F10"
}'
```

## PURCHASE END POINT HTTP POST REQUEST EXAMPLE VIA CURL

```bash
curl --location 'http://localhost:8000/api/purchase' \
--header 'Content-Type: application/json' \
--data '{
    "product": 1,
    "taxNumber": "GR658565478",
    "couponCode": "F10",
    "paymentProcessor": "paypal"
}'
```
