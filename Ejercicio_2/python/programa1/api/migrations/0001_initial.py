# Generated by Django 4.2.6 on 2023-10-21 20:33

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Informacion',
            fields=[
                ('codigo', models.AutoField(primary_key=True, serialize=False)),
                ('nombre_archivo', models.CharField(blank=True, max_length=100, null=True)),
                ('cant_lineas', models.IntegerField(blank=True, null=True)),
                ('cant_palabras', models.IntegerField(blank=True, null=True)),
                ('cant_caracteres', models.IntegerField(blank=True, null=True)),
                ('fecha_registro', models.DateField(auto_now=True)),
            ],
        ),
    ]
