# Interlinear-Text-Creator
Tool to create interlinear texts for language learning

## Example Output:
![](Screenshot_2020-08-27-21-54-44-627_com.android.chrome.png)

## Input Form
![](Screenshot_2020-08-27-21-54-29-639_com.android.chrome.png)

---
## Explanation of how to use the application:

### Preparatory steps to install the application

#### On Android with a local server

- download this repository
- make sure the phpqrcode-folder is complete and contains the folder "cache" (if not, go to [phpqrcode.sourceforge.net](http://phpqrcode.sourceforge.net/) and download the zip file from there, extract it and copy the folder "cache" from the folder "phpqrcode" into the folder "phpqrcode" inside the Interlinear Text-Creator folder.)
- download and install the App "AWebServer"
- copy the folder of the Interlinear Text-Creator into the folder "apache_htdocs"
- Open the App "AWebServer" and click on the button "Start" in the field "Service"
- In the App "AWebServer" click on the blue link in the field "Address", which can e.g. read something like http://0.0.0.0:8080. This will open your browser to rhis address
- Navigate to the folder of the Interlinear Text-Creator, which you copied earlier on into the folder "apache_htdocs"
- In your browser, click on the file "start.php", and by this, you open the start-form of the Interlinear Text-Creator.

#### On a remote server e.g. from a free webhosting provider (which allows for the execution of .php-files)

- download this repository
- make sure the phpqrcode-folder is complete and contains the folder "cache" (if not, go to [phpqrcode.sourceforge.net](http://phpqrcode.sourceforge.net/) and download the zip file from there, extract it and copy the folder "cache" from the folder "phpqrcode" into the folder "phpqrcode" inside the Interlinear Text-Creator folder.)
- Register somewhere for a free webhosting service (which supports PHP and FTP-upload)
- upload the folder of the Interlinear Text-Creator via FTP to the public folder on your web server
- Navigate with a browser to the file "start.php" inside the folder of the Interlinear Text-Creator and by this, you open the start-form of the Interlinear Text-Creator.

### How to use the Input form
Following are instructions on how to use the Input-form of the file "start.php"

#### 1) Project-Name
**Enter a name for the project.** This simply determines the folder-name of where the project is going to be saved.

#### 2) Song-Name
**Enter the name of the song**, the Lyrics of which you want to turn into an interlinear text. This name will show up as the title of the html-output-document.

#### 3)  Interpret
**Enter the name of the Interpret of the song**. This name will also show up in the title of the html-output-document.

#### 4) Source-Language (Short-Form)
**Enter the language short-form that denotes the source-language** of the interlinear text you intend to create.

For **example**, **if you try to learn Spanish and your native language is English**, then because you would pick a Spanish Text and want to create an interlinear translation for each word **FROM Spanish INTO English**, then you should enter the short-form for Spanish here, which is "es"

Available options:
- "en" (for English)
- "es" (for Spanish)
- "de" (for German)

This setting will help determines the language of the explanatory text, which will be added to the html-output-document

#### 5) Target-Language (Short-Form)
**Enter the language short-form that denotes the target-language** of the interlinear text you intend to create.

In accordance with the above example of wanting to learn Spanish while your native language is English, you should here pick the short-form for English, which is "en", as you would want the words to be translated FROM Spanish INTO English.

Available options:
- "en" (for English)
- "es" (for Spanish)
- "de" (for German)

#### 6) URL to Music Video
Here you can **enter a Link to** a Youtube-video, where you can listen to **an Audio-recording of the Source-text**, that you are about to enter.

In the case of the above example of someone who already knows English who wants to learn Spanish, the link you would need to enter here would be to an audio-recording (or a video of an audio-recording) of the Spanish text, which you are about to enter later on (in the field "Source-Text (original)".

#### 7) URL to explanation how to use this Interlinear Text
Here you can **enter a link to a text, which explains how to use the interlinear text** you are about to create for language learning.

You could for example enter the link "[http://vidactic.com/?page_id=868](http://vidactic.com/?page_id=868)", which leads to a text (in English) that explains the Birkenbihl-Method of language learning.

#### 8) Source-Text (original)
Following the example above of someone who already knows English and wants to learn Spanish, **in this field you can enter the text in the Source-Language** (which in this example would be Spanish), **with the help of which you would like to learn the Source-Language.**

Please note, that **the text needs to follow a specific syntax**, so that the application can later on create the interlinear text.

So far the available formatting options that the application supports are:
- h1 (header 1)
- h2 (header 2)
- h3 (header 3)
- p (paragraph)
- br (linebreak)
- brbr (double-linebreak)

Note that:
- **the code-words** which determine the format of a paragraph **need to be in the first line of a new segment** **and** need to be **placed within two equal-signs**, e.g. =h1=, =h2=, =h3=, =p=, =br=, =brbr=
- **segments are separated by a separate line with three dashes** ("---")


An Example-Text for this field could be:

```
=h1=
This is the title
---
=p=
Here follows a first paragraph. This paragraph contains multiple sentences.
---
=h2=
Here follows a subheading level 2.
---
=p=
Here follows yet another paragraph. This paragraph also contains multiple sentences.
```

#### 9) Button "Split Source into Lines"
After entering the source-text into the field "Source-Text (original)", you need to **press the button "Split Source into Lines"**. By this, a copy of the Source-Text, with every space replaced with a linebreak is placed in the field "Source-Text (split into lines)".

#### 10) Source-Text (split into lines)
The **text that appeared in this field**, you can now highlight and **copy into a machine-translation software** e.g. the [DeepL-translator](http://deepl.com/translator) or [Google-Translate](http://translate.google.com) to obtain the translation of the text into the target-language - in this example into English.

By translating a text, where each word is on a separate line, the machine-translation software should less likely translate whole sentences but instead rather each word separately (which is exactly what we want, when we want to create an interlinear text that is to be used in accordance with the [Birkenbihl-Method](http://vidactic.com/?page_id=868) or the Hamiltonian System of Language Learning. [For more information on the Hamiltonian System, see [Discussion Thread on the Hamiltonian System on "how-to-learn-any-language.com"](http://how-to-learn-any-language.com/forum/forum_posts.asp?TID=26299), and also the book [The History, Principles, Practice, and Results of the
 Hamiltonian System](https://archive.org/details/historyprinciple00hamirich)])

#### 11) Target-Text (split into lines)
Here you can **paste the translation that you obtained from the machine-translation software**.

However, **you may want to proofread the translation** of the machine-translation software **before pasting it into this field here**.

#### 12) Button "Submit Form"
Now you can **click on the button "Submit Form"**.

**This will send the information** of the form **to the file "save_new_text.php"** **and will create the html-output-document**.

### What to do after you clicked on "Submit Form"
On the page "save_new_text.php" you can now scroll to the bottom and **click on the link "Open Newly created HTML-file"**. 

This will lead you to the html-output-document which contains the newly created interlinear text.

If you **open this page in the Chrome-Browser** on Android, you can there **click on "…" > "Share" > "Print"** where you can choose **"Save as PDF"** to save the interlinear text as a pdf, which you could later on use to print out the interlinear text.

---
**Feel free to contribute and add additional functions**
