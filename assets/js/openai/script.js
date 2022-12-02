const express = require('express');
const cors = require('cors');
// on récupère les modules nécessaires
const fs = require('fs');
const https = require('https');

const { Configuration, OpenAIApi } = require("openai");
const configuration = new Configuration({
    apiKey: "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",
});
const openai = new OpenAIApi(configuration);

async function createUrlImage(prompt){
    const response = await openai.createImage({
        prompt: prompt,
        n: 1,
        size: "1024x1024",
    });
    image_url = response.data.data[0].url;
    console.log(image_url);
    return image_url;
};



async function download(url, destPath){
    return new Promise(resolve => {
        const file = fs.createWriteStream(destPath);
        const request = https.get(url, function(response) {
            response.pipe(file);

            // after download completed close filestream
            file.on("finish", () => {
                file.close();
                console.log("Download Completed");
                resolve();
            });
        });
    });
}

async function main(prompt){
    let link = await createUrlImage(prompt);
    console.log(link)
    await download(link, './img/profile.jpg');

}
// main();

const app = express();
app.use(express.json());
app.use(cors());
console.log("test");
app.post('/', async (req, res) => {
    console.log(req.body);
    await main(req.body.description);
    res.send('Image found')
});

app.listen(3000)