# Xmas 2023
This page generates random content for an online Christmas card, addressed to a specific person, with three random themes.

# HTML
This comprises of the main sections
- `card` div which is a container. It is styled using `theme_snow`, `theme_food` and `theme_nativity`.
- `image` which contains the image for the card.
- `greeting` which contains the generated text content, which is a h1 tag and a paragraph.

# CSS
The three themes will influence the styling for `card`, `image` and `greeting`. We use LESS so as to take advantage of some mixins and make code more readable.
- `theme_snow`: A circular image of a snowman on top of the text block, both superimposed on a  translucent white rectangle with rounded corners, on a blue background.
- `theme_food`: Image and content are long rectangular blocks on the left and right side of a cream-colored container with a shadow, over a brown background.
- `theme_nativity`: Image covers the entirety of the container which has a thick brown border and a beige background, and the text block is in a translucent black rectangle within the image.

# PHP
We have an object theat stores theme names and a prompt. Randomly, one of these are picked, and `card` is styled using the theme name. The prompt is then fed to CHatGPT, and the returned result becomes the text greeting. The prompt has to limit the number of words, due to space limitations and font size constraints.

The title is addressed to "Human Being" by default, or the value provided in the `name` parameter of the URL.
