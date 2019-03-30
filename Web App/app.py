from flask import Flask, render_template,url_for


app = Flask(__name__)
app.static_folder = 'static'
@app.route('/')
def home():
    return render_template("index.html")

@app.route('/register')
def registeration():
    return render_template('signup.html')


if __name__ == '__main__':
    app.run(debug=True)