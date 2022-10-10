var InputList = {
    append: function(parrentId, content="") {
        var parrent = document.getElementById(parrentId);
        var items = parrent.getElementsByClassName('input-list-element')
        var newElem = items[items.length-1].cloneNode(true);
    
        for (input of newElem.getElementsByTagName('input')) {
            if (typeof content === 'string' || !(input.name in content)) {
                input.value = content;
            }
            else {
                input.value = content[input.name];
            }
        }
        
        newElem.id = parrentId+"_"+String(parseInt(items[items.length-1].id.split("_")[1])+1);
        newElem.getElementsByTagName('button')[0].onclick = function() { InputList.remove(parrentId,newElem.id) };
        parrent.appendChild(newElem);
    },

    remove: function(parrentId, id) {
        var parrent = document.getElementById(parrentId);
        var items = parrent.getElementsByClassName('input-list-element');
        if (id != null && items.length > 1 /* && items[items.length-1].id != id*/) {
            document.getElementById(id).remove();
        }
    },

    update: function(parrentId, id=null) {
        var parrent = document.getElementById(parrentId);
        var items = parrent.getElementsByClassName('input-list-element');
        if (Array.from(items[items.length-1].getElementsByTagName('input')).map(input => input.value).reduce((a,v) => a+v) != "") {
            InputList.append(parrentId, "");
        }
    },

    parse: function(parrentId) {
        var output = [];
        return Array.from(document.getElementById(parrentId).getElementsByClassName('input-list-element')).map(elem => { //read inputs
            if (elem.getElementsByTagName('input').length == 1) {
                return elem.getElementsByTagName('input')[0].value;
            } else {
                entry = {};
                // for (field of [... elem.getElementsByTagName('input')]) {
                for (field of Array.from(elem.getElementsByTagName('input'))) {
                    entry[field.name] = field.value;
                }
                return entry;
            }
        }).filter(elem => { //filter empty
            if (typeof elem === 'string') {
                return elem != "";
            } else {
                return Object.keys(elem).reduce((acc,key) => {(elem[key] != "") || acc} ,false);
            }
        });
    }
}

//convert image to base 64
function getBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = error => reject(error);
    });
}

function updateImage() {
    imgFile = document.getElementById("image_picker").files[0];
    imgElement = document.getElementById("ProfilePicture");

    getBase64(imgFile).then(data => {imgElement.src = data; /*console.log(imgElement.src)*/});
}

function back() {
    window.location.href = "./input.php"+"?key="+sessionKey;
}

function sendToBackend(data) {
    console.log(data);
    //send data to backen here
}

function submit() {
    for (key in parsedData) {
        if (!document.getElementById(key)) {
            continue;
        }

        if (Array.isArray(parsedData[key])) {
            parsedData[key] = InputList.parse(key);
        } else {
            parsedData[key] = document.getElementById(key).value;
        }
    }
    parsedData["Image"] = document.getElementById("ProfilePicture").src
    console.log(parsedData);
    // console.log();
}



//------------------------------------------------
var queryDict = {}
location.search.substr(1).split("&").forEach(function(item) {queryDict[item.split("=")[0]] = item.split("=")[1]})
if ("key" in queryDict) {
    sessionKey = queryDict["key"];
}
else {
    sessionKey = "no_key";
    console.log("invalid or no session key") //do some more stuff
}
sessionStorage.setItem("sessionKey",sessionKey); //maby we can also do without?
console.log(sessionKey);

// parsedData = JSON.parse(sessionStorage.getItem("parsedData"));
// parsedData = Bill_Gates;
parsedData = Nadin_Zaya;
console.log(parsedData);

for (const [key, value] of Object.entries(parsedData)) {
    if (!document.getElementById(key)) {
        continue;
    }
    if (Array.isArray(value)) {
        for (val of value) {
            InputList.append(key,val);
        }
        // InputList.append(key,"")
        InputList.remove(key,key+"_0");
    } else {
        document.getElementById(key).value = value;
    }
}

