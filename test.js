// Authorization token that must have been created previously. See : https://developer.spotify.com/documentation/web-api/concepts/authorization
const token = 'BQA3P5mCCmrZUS66GRpJvDM7iwEbu44KnF3CfIpj7lG_jiIeJ2DXK5sm3I6VNk2Q01u7_J6y9Bdy5P8QDWtC-hSlosdNV-WraQrA-5JNaL5h0EjYQngq1f-ZDQQEgfIgIRNhPRv3Vd-EPtMlegzLD7hudRbdCxtJsPJGoIoseTEpmV8I87ORFO_QY1EQa9GIvRNrvXEAsfY8qws4sDB33jKDvP4iL1TWIlKPM4e8Rn64nVU5oGpaUGB3N4LO5Tl6JVaO7yE2ZJfAtXxLJkXkmzT5_JDR22_Juw0wpUmFgr8EOzPDtj0NiRfaPELQ';
async function fetchWebApi(endpoint, method, body) {
    const res = await fetch(`https://api.spotify.com/${endpoint}`, {
        headers: {
            Authorization: `Bearer ${token}`,
        },
        method,
        body:JSON.stringify(body)
    });
    return await res.json();
}

async function getTopTracks(){
    // Endpoint reference : https://developer.spotify.com/documentation/web-api/reference/get-users-top-artists-and-tracks
    return (await fetchWebApi(
        'v1/me/top/tracks?time_range=long_term&limit=5', 'GET'
    )).items;
}

const topTracks = await getTopTracks();
console.log(
    topTracks?.map(
        ({name, artists}) =>
            `${name} by ${artists.map(artist => artist.name).join(', ')}`
    )
);