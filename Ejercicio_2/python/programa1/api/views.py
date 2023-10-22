from django.shortcuts import render, redirect
from django.http import HttpResponse
from .models import Informacion
from django.core.paginator import Paginator
from django.views import View
from reportlab.lib.pagesizes import letter
from reportlab.platypus import SimpleDocTemplate, Table, TableStyle

# Create your views here.

def index(request):
    informacion = Informacion.objects.all()
    paginator = Paginator(informacion, 10)
    page = request.GET.get('page')
    informacion_paginada = paginator.get_page(page)
    return render(request, "index.html", {'info': informacion_paginada})

def add_information(request):
    if request.method == 'POST' and request.FILES.get('archivo'):
        archivo = request.FILES['archivo']

        nombre_archivo = archivo.name
        contenido = archivo.read()
        lineas = contenido.splitlines()
        palabras = contenido.split()
        num_lineas = len(lineas)
        num_palabras = len(palabras)
        num_caracteres = len(contenido)

        archivo_procesado = Informacion(
            nombre_archivo=nombre_archivo,
            cant_lineas=num_lineas,
            cant_palabras=num_palabras,
            cant_caracteres=num_caracteres
        )
        archivo_procesado.save()

        return redirect('index')
    else:
        return HttpResponse("No se envió un archivo para procesar.")

class GenerarPDF(View):
    def get(self, request):
        response = HttpResponse(content_type='application/pdf')
        response['Content-Disposition'] = 'attachment; filename="archivos_procesados.pdf"'

        archivos = Informacion.objects.all()
        data = [["Codigo", "Nombre del Archivo", "Cantidad de Líneas", "Cantidad de Palabras", "Cantidad de Caracteres", "Fecha de Registro"]]

        for archivo in archivos:
            data.append([archivo.codigo, archivo.nombre_archivo, archivo.cant_lineas, archivo.cant_palabras, archivo.cant_caracteres, archivo.fecha_registro])

        # Aumenta el ancho de la columna del nombre del archivo
        col_widths = [50, 150, 100, 100, 100, 100]

        doc = SimpleDocTemplate(response, pagesize=letter)
        elements = []

        table = Table(data, colWidths=col_widths)
        table.setStyle(TableStyle([
            ('BACKGROUND', (0, 0), (-1, 0), (0.8, 0.8, 0.8)),
            ('TEXTCOLOR', (0, 0), (-1, 0), (0, 0, 0)),
            ('ALIGN', (0, 0), (-1, -1), 'CENTER'),
            ('FONTNAME', (0, 0), (-1, 0), 'Helvetica-Bold'),
            ('BOTTOMPADDING', (0, 0), (-1, 0), 12),
            ('BACKGROUND', (0, 1), (-1, -1), (0.85, 0.85, 0.85)),
            ('GRID', (0, 0), (-1, -1), 1, (0, 0, 0)),
        ]))

        elements.append(table)
        doc.build(elements)

        return response