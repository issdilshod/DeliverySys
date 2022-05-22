# DeliverySys
Module for working with deliveries.
## About DeliverySys

Requests:
- FastDelivery: /fast -> POST [base_url=@var, sourceKladr=@var, targetKladr=@var, weight=@float]
- SlowDelivery: /slow -> POST [base_url=@var, sourceKladr=@var, targetKladr=@var, weight=@float]

Responses:
- JSON [price: @float, date: @var, error: @var]
