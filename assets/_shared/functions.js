export async function request (url, options) {
    try {

        const response = await fetch (url, options);
        const data = await response.json();
        return data;

        /*if (response.headers.get('content-type').includes('application/json')) {
            const data = await response.json();
            return data;
        } else {
            const textData = await response.text();
            return textData;
        }*/

    } catch (err) {
        console.error(err);
        return {
            type: "error",
            message: err.message
        };
    }
}
