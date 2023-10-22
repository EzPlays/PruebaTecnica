from django.urls import path
from .views import index, add_information, GenerarPDF

urlpatterns = [
    path('', index, name='index'),
    path('procesar_archivo/', add_information, name='procesar_archivo'),
    path('generar-pdf/', GenerarPDF.as_view(), name='generar_pdf'),
]