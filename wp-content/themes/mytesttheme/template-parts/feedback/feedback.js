
setTextArea();
setListenersClipFile();
setListenersImg();

function setListenersClipFile() {
    const feedbackClipFile = document.querySelector(".feedback_clip-file .feedback_img-file");
    const feedbackClipFileLink = document.querySelector(".feedback_clip-file .feedback_brief-file");

    feedbackClipFile.addEventListener("change", function(){
        const objURL = window.URL.createObjectURL(this.files[0]);
        feedbackClipFileLink.href = objURL;
        
        const fileNameElem = feedbackClipFileLink.querySelector('span');
        let fileName = this.files[0].name;
        fileName = fileName.substring(0, 15) + ' ...';

        fileNameElem.textContent = fileName;
        
        feedbackClipFileLink.removeAttribute('style');
    });
    
}

function setListenersImg() {
    const feedbackClipImg = document.querySelector(".feedback_clip-img .feedback_img-file");
    const feedbackImgGallery = document.querySelector(".feedback_clip-img .feedback_img-gallery");

    let filesMap = new Map();
    feedbackClipImg.addEventListener("change", function() {
        let length = this.files.length;
        for(let i = 0; i < length; i++) {
            let mapKey = this.files[i].name;
            let mapValue = this.files[i];
            if(filesMap.has(mapKey)) continue;  
            filesMap.set(mapKey, mapValue);

            let img = document.createElement('img');
            img.className = 'feedback_img-gallery-item';
            img.src = window.URL.createObjectURL(mapValue);
            feedbackImgGallery.append(img);
            if(feedbackImgGallery.hasAttribute("style")) feedbackImgGallery.removeAttribute("style"); 
        } 
                
        console.log(filesMap);
    });

}



function setTextArea() {
    const deviceWidth = document.documentElement.clientWidth;
    console.log(deviceWidth);
    const feedbackDescription = document.querySelector('.feedback_description');
    console.log(feedbackDescription);
    const widthPoint = [400, 600, 800, 1000, 1066];
    
    if (deviceWidth < widthPoint[0]) {
        feedbackDescription.maxLength = "100";
        return;
    }
    
    if (deviceWidth < widthPoint[1]) {
        feedbackDescription.maxLength = "130";
        return;
    }
    
    if (deviceWidth < widthPoint[2]) {
        feedbackDescription.maxLength = "180";
        return;
    }

    if (deviceWidth < widthPoint[3]) {
        feedbackDescription.maxLength = "225";
        return;
    }

    if (deviceWidth < widthPoint[4]) {
        feedbackDescription.maxLength = "315";
        return;
    }

    if (deviceWidth >= widthPoint[4]) {
        feedbackDescription.maxLength = "215";
        return;
    }
}

