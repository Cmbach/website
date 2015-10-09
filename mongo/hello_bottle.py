from bottle import *

@route('/hello/:name')
def index(name):
    return template('<b>Hello {{name}}</b>!', name=name)

run(host='localhost', port=9090)
