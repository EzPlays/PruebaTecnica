from django.db import models

# Create your models here.
class Informacion(models.Model):
    codigo = models.AutoField(primary_key=True)
    nombre_archivo = models.CharField(blank=True, null=True, max_length=100)
    cant_lineas = models.IntegerField(blank=True, null=True)
    cant_palabras = models.IntegerField(null=True, blank=True)
    cant_caracteres = models.IntegerField(blank=True, null=True)
    fecha_registro = models.DateField(auto_now=True)